<form method="post" action="{{route('calculator.store')}}">
    @csrf
    @method('post')
    <table class="table text-white table-auto bg-gray-50 w-5/6 text-center" style="padding: 0px">
        <tr>
            <td colspan="6" style="padding: 10px">
                <input type="text" class="form-input bg-gray-500 w-full" name="calculation"
                       placeholder="formula!" id="calculation" value="{{ session('calculation') ?? '' }}">
            </td>
            <td style="padding-right: 10px">
                <x-calculator-action-button class="ms-3" onclick="removeChar()"><</x-calculator-action-button>
            </td>
        </tr>
        <tr>
            <td colspan="7">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td>
                <x-calculator-action-button class="ms-3" onclick="addChar('/')" id="button47">/</x-calculator-action-button>
            </td>
            <td>
                <x-calculator-action-button class="ms-3" onclick="addChar('*')" id="button42">*</x-calculator-action-button>
            </td>
            <td>
                <x-calculator-action-button class="ms-3" onclick="addChar('-')" id="button45">-</x-calculator-action-button>
            </td>
            <td>
                <x-calculator-action-button class="ms-3" onclick="addChar('+')" id="button43">+</x-calculator-action-button>
            </td>
            <td>
                <x-calculator-action-button class="ms-3" onclick="addChar('(')" id="button40">(</x-calculator-action-button>
            </td>
            <td>
                <x-calculator-action-button class="ms-3" onclick="addChar(')')" id="button41">)</x-calculator-action-button>
            </td>
            <td rowspan="5" style="padding-right: 10px">
                <x-primary-button class="ms-3 h-full" style="height: 180px" id="button13">=</x-primary-button>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('7')" id="button55">7</x-calculator-number-button>
            </td>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('8')" id="button56">8</x-calculator-number-button>
            </td>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('9')" id="button57">9</x-calculator-number-button>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('4')" id="button52">4</x-calculator-number-button>
            </td>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('5')" id="button53">5</x-calculator-number-button>
            </td>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('6')" id="button54">6</x-calculator-number-button>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('1')" id="button49">1</x-calculator-number-button>
            </td>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('2')" id="button50">2</x-calculator-number-button>
            </td>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('3')" id="button51">3</x-calculator-number-button>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('0')" id="button48">0</x-calculator-number-button>
            </td>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('00')">00</x-calculator-number-button>
            </td>
            <td colspan="2">
                <x-calculator-number-button class="ms-3" onclick="addChar('.')" id="button44">.</x-calculator-number-button>
            </td>
        </tr>
    </table>
</form>

<script>
    /* add char to the calculations field */
    function addChar(value) {
        $('#calculation').val($('#calculation').val() + value);
    }
    /* removes latest char from the calculations field */
    function removeChar() {
        $('#calculation').val($('#calculation').val().slice(0, -1));
    }
    /* evaluates key-button presses to use calculator */
    $(document).on('keypress',function(e) {
        if (
            $.inArray(e.which, [13, 40, 41, 42, 43, 44, 45, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57]) !== -1
            && $('#calculation').is(':focus') === false
        ) {
            $("#button" + e.which).click();
        }
    });
</script>
