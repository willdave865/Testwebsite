<html>
<style type="text/css">
    /*
        credit for css: https://stackoverflow.com/questions/27852954/center-binary-tree-with-css-or-js
        will make my own in the near future
        took css from stack and removed a lot and added the border to nodes
    */
    * {margin: 0; padding: 0;}

    .tree ul {
        padding-top: 20px; position: relative;
    }

    .tree li {
        float: left; text-align: center;
        list-style-type: none;
        position: relative;
        padding: 20px 5px 0 5px;
    }

    /*We will use ::before and ::after to draw the connectors*/

    .tree li::before, .tree li::after{
        content: '';
        position: absolute; top: 0; right: 50%;
        border-top: 1px solid #ccc;
        width: 50%; height: 20px;
    }
    .tree li::after{
        right: auto; left: 50%;
        border-left: 1px solid #ccc;
    }

    /*We need to remove left-right connectors from elements without
    any siblings*/
    .tree li:only-child::after, .tree li:only-child::before {
        display: none;
    }

    /*Remove space from the top of single children*/
    .tree li:only-child{ padding-top: 0;}

    /*Remove left connector from first child and
    right connector from last child*/
    .tree li:first-child::before, .tree li:last-child::after{
        border: 0 none;
    }
    /*Adding back the vertical connector to the last nodes*/
    .tree li:last-child::before{
        border-right: 1px solid #ccc;
        border-radius: 0 5px 0 0;
    }
    .tree li:first-child::after{
        border-radius: 5px 0 0 0;
    }

    /*Time to add downward connectors from parents*/
    .tree ul ul::before{
        content: '';
        position: absolute; top: 0; left: 50%;
        border-left: 1px solid #ccc;
        width: 0; height: 20px;
    }

    /*my own css*/
    .tree p {
        border-style: solid;

    }

    #frequencyTable {
        border-style: solid;

    }

</style>
<head>
    <title>Binary Sort Tree</title>
</head>
<body>
    Text to build Huffman Tree:<input type="text" id="input">
    <button id="beginHuffmanTree">Begin</button>
    <table id="frequencyTable">
    </table>
    <div class="tree" id="tree">
    </div>
    <table id="output" style="display: none;">
        <tr>
            <td>Original String: </td>
            <td id="huffmanWords"></td>
        </tr>
        <tr>
            <td>Huffman Encoding: </td>
            <td id="huffmanCodes"></td>
        </tr>
        <tr>
            <td>Normal Encoding: </td>
            <td id="normalEncoding"></td>
        </tr>
        <tr>
            <td>Number of Bits saved: </td>
            <td id="savedBits"></td>
        </tr>
    </table>
    <script type="text/javascript">
        document.getElementById('beginHuffmanTree').addEventListener("click", begin);
        function begin() {
            var input = document.getElementById('input').value;
            var freqArr = new Array;
            var oldFreqArr = new Array;
            var charArr = new Array;
            var text = "<th>Frequency</th><th>Character</th>";
            while (input.length > 0) {
                var freq = 0;
                var char = input.charAt(0);
                freq = getFrequency(char, input);
                input = removeChar(char, input);
                freqArr.push(freq);
                charArr.push(char);
            }
            orderArrays(freqArr, charArr);
            for (var i = 0; i < freqArr.length; i++) {
                text += "<tr><td>" + freqArr[i] + "</td><td>" + charArr[i] + "</td></tr>";
            }
            document.getElementById('frequencyTable').innerHTML = text;
            text = "";
            oldFreqArr = freqArr.slice();
            while (freqArr.length > 1) {
                var oldFreqs;
                var newFreq;
                var newChar;
                newFreq = freqArr[0] + freqArr[1];
                oldFreqs = [oldFreqArr[0], oldFreqArr[1]];
                newChar = [charArr[0], charArr[1]];
                charArr.splice(0, 2, newChar);
                freqArr.splice(0, 2, newFreq);
                var temp = freqArr.slice();
                oldFreqArr.splice(0, 2, oldFreqs);
                orderArrays(freqArr, charArr);
                orderArrays(temp, oldFreqArr);
            }
            text += generateOutput(charArr, oldFreqArr);
            document.getElementById('tree').innerHTML = '<ul>' + text + '</ul>';
            encodeAndDisplay(document.getElementById('input').value, charArr);
        }
        function sumIntArray(intArray) {
            var returnVal = 0;
            if (Array.isArray(intArray)) {
                for (var i = 0; i < intArray.length; i++) {
                    returnVal += sumIntArray(intArray[i]);
                }
            } else {
                returnVal = intArray;
            }
            return returnVal;
        }
        function generateOutput(charArray, freqArray) {
            var text = "";
            for (var i = 0; i < charArray.length; i++) {
                if (Array.isArray(charArray[i])) {
                    text += "<li><p>NODE | " + sumIntArray(freqArray[i]) + "</p><ul>";
                    text += generateOutput(charArray[i], freqArray[i]);
                } else {
                    text += "<li><p>" + charArray[i] + " | " + freqArray[i] + "</p></li>";
                }
            }
            text += "</ul></il>";
            return text;
        }
        function orderArrays(freq, char) {
            //implementation of a bubble sort
            var i = freq.length;
            while (i > 0) {
                if (freq[i - 1] > freq[i]) {
                    freq.splice(i - 1, 0, freq[i]);
                    char.splice(i - 1, 0, char[i]);
                    freq.splice(i + 1, 1);
                    char.splice(i + 1, 1);
                    //the above code swaps their places
                    if (i < freq.length) {
                        i += 2;
                        //because i is decremented later
                    }
                    //move back in case there are bigger values further right
                }
                i--;
            }
        }
        function getFrequency(character, string) {
            var returnVal = 0;
            for (var i = 0; i < string.length; i++) {
                if (string.charAt(i) === character) {
                    returnVal++;
                }
            }
            return returnVal;
        }
        function removeChar(character, string) {
            return string.replace(new RegExp(character, 'g'), '');
        }
        function encodeAndDisplay(string, charArray) {
            var maxCol = 16777215;
            var code = "";
            var words = "";
            var huffmanOutput = "";
            var textOutput = "";
            var normalEncoding = "";
            var savedBits = 0;
            for (var i = 0; i < string.length; i++) {
                text = encodeHelper(string.charAt(i), charArray[0], "");
                //first elem of char array because it is an array with the final array in it
                //due to building the tree by reducing the array to one single value which is an array
                var col = Math.random() * maxCol; //this is the max colour value
                col = Math.round(col);
                var backgroundCol = maxCol - col; //this gets the complimentary colour
                huffmanOutput += "<span style='color: #" + col.toString(16) + ";background-color: #" + backgroundCol.toString(16) + "'>" + text + "</span>";
                savedBits += 8;
                console.log(text);
                savedBits -= text.length;
                console.log(savedBits);
                textOutput += "<span style='color: #" + col.toString(16) + ";background-color: #" + backgroundCol.toString(16) + "'>" + string.charAt(i) + "</span>";
                var asciiEncoding = string.charCodeAt(i).toString(2);
                asciiEncoding = new Array(9 - asciiEncoding.length).join('0') + asciiEncoding;
                normalEncoding += "<span style='color: #" + col.toString(16) + ";background-color: #" + backgroundCol.toString(16) + "'>" + asciiEncoding + "</span>";
            }
            document.getElementById('output').style.display = "table";
            document.getElementById('huffmanCodes').innerHTML = huffmanOutput;
            document.getElementById('huffmanWords').innerHTML = textOutput;
            document.getElementById('normalEncoding').innerHTML = normalEncoding;
            document.getElementById('savedBits').innerHTML = savedBits + " (- bits storing table/tree)";
            return text;
        }
        function encodeHelper(char, charArray, whichDir) { //return encoding of character
            if (Array.isArray(charArray)) {
                //at a node so go left or right
                var temp = encodeHelper(char, charArray[0], whichDir + "0");
                //temp will be result of searching left tree
                //if empty then the right tree will contain our leaf
                if (temp === "") {
                    temp = encodeHelper(char, charArray[1], whichDir + "1");
                }
                return temp;
            } else {
                //we are at a leaf node
                if (char === charArray) {
                    return whichDir;
                } else {
                    return "";
                }
            }
        }
    </script>
</body>
</html>