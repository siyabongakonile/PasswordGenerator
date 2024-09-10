<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>
</head>
<body>
    <div class="passgen-cont">
        <div class="passgen-inner">
            <div class="title-cont">
                <h2>Password Generator</h2>
            </div>
            <div class="passgen-form-cont">
                <form>
                    <div class="form-row">
                        <label>Constraints</label>
                    </div>
                    <div class="form-row">
                        <label for="all"><input type="checkbox" name="all" id="all" checked> All</label>
                        <label for="alphabet"><input type="checkbox" name="alphabet" id="alphabet" checked> Alphabet</label>
                        <label for="numbers"><input type="checkbox" name="numbers" id="numbers" checked> Numbers</label>
                        <label for="special-chars"><input type="checkbox" name="special-chars" id="special-chars" checked> Special Characters</label>
                    </div>
                    <div class="form-row">
                        <label for="num-chars">Number of Characters: <input type="number" name="num-chars" id="num-chars" value="8" max="20" min="4"></label>
                    </div>
                    <div class="form-row">
                        <input type="submit" value="Generate">
                    </div>
                </form>
            </div>
            <div class="result-cont">
                <p id="results"></p>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>