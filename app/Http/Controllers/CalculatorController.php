<?php

namespace App\Http\Controllers;

use App\Models\Calculator;
use Illuminate\Http\Request;
use MathParser\Interpreting\Evaluator;
use MathParser\StdMathParser;

class CalculatorController extends Controller
{
    /**
     * generates latest calculations view
     * @return object
     */
    public function index(): object
    {
        $calculations = Calculator::latest()->take(10)->get();
        return view('calculator', ['calculations' => $calculations]);
    }

    /**
     * @param Request $request
     * @return object
     */
    public function store(Request $request): object
    {
        /* validating fields */
        $data = $request->validate([
            'calculation' => 'required',
        ]);

        /* cleaning using regex */
        $data['calculation'] = preg_replace('#[^0-9+\-*/=^().]#', '', str_replace(',', '.', $data['calculation']));
        if (empty($data['calculation'])) {
            return redirect(route('calculator'))
                ->withErrors(['error' => 'Calculation happened to be empty!'])
                ->with('calculation', $data['calculation']);
        }
        /* checking if ( amount is = ) */
        $charCounts = count_chars($data['calculation'], 1);
//        dd($charCounts);
        if (($charCounts[40] ?? 0) != ($charCounts[41] ?? 0)) {
            return redirect(route('calculator'))
                ->withErrors(['error' => 'All brackets gave to be closed!'])
                ->with('calculation', $data['calculation']);
        }
        /* evaluating string */
        $parser = new StdMathParser();
        $AST = $parser->parse($data['calculation']);
        $evaluator = new Evaluator();
        $data['response'] = $AST->evaluate($evaluator);

        /* saving to database */
        Calculator::create($data);

        return redirect(route('calculator'))->with('success', 'Calculation succeeded!')->with('calculation', $data['response']);
    }
}
