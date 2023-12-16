<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="360713.png" type="image/x-icon">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        <title>Ankieta</title>
    </head>
    <body>
        <header>
            <h1>ASTRONOMIA</h1>
        </header>
        <nav>
            <ul class="navbar">
                <li>
                    <div class="dropdown">
                        <a class="dd_button" href="index.html">Strona główna</a>
                        <svg width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16" id="IconChangeColor"> <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" id="mainIconPathAttribute" stroke-width="2" stroke="#942192" fill="#5e0699"></path> </svg>
                    <div class="dd_content">
                        <a href="index.html#omnie">O mnie</a>
                        <a href="index.html#i1">Galeria</a>
                        <a href="index.html#contact">Kontakt</a>
                    </div>
                    </div>
                </li>
                <li><a href="gwiazdy.html">Gwiazdy</a></li>
                <li><a href="ankieta.html">Ankieta</a></li>
            </ul>
        </nav>
        <main>
            <div class="text">
                <h4>Ankieta</h4>
                <p id="highlight">Czytelniku,<br>
                    W tej części mojej strony chciałbym zachęcić cię do wykonania krótkiej ankiety związanej z moim zainteresowaniem. Nie jest ona w żaden sposób testem wiedzy, a jedynie zbiorem pytań sprawdzających zainteresowanie i powiązanie tematem, o którym piszę. Dane zebrane w niej nie zostaną wykorzystane w sposób inny niż dydaktyczny i będą dostępne tylko dla mnie. Twoje uczestnictwo w tej ankiecie będzie miało istotne znaczenie. Pomoże mi ono również dostosować zawartość mojej strony do twoich potrzeb i zainteresowań. Chciałbym, aby moja strona była źródłem ciekawych i wartościowych informacji na temat astronomii, które odpowiadają Twojemu zakresowi zainteresowania. Twoja opinia i wkład są niezwykle cenne, dlatego bardzo Cię proszę, abyś poświęcił kilka chwil na wypełnienie ankiety. Dziękuję za poświęcony czas i zaangażowanie w rozwój tej strony.</p>
            </div>
            <form id="ankieta" action="odbierz.php" method="get" onsubmit="get_data()">
                <label for="name">Wpisz swoje imię:</label><br>
                <input type="text" id="name" name="name" onclick="thanks()"><br>
                <fieldset id="gender">
                    <legend>Zaznacz swoją płeć:</legend>
                    <input type="radio" id="man" name="gender" value="M">
                    <label for="man">Mężczyzna</label><br>
                    <input type="radio" id="woman" name="gender" value="K">
                    <label for="woman">Kobieta</label><br>
                    <input type="radio" id="no" name="gender" value="N">
                    <label for="no">Inna/Nie chcę podawać</label>
                </fieldset>
                <label for="rate">Jak oceniasz wygłąd i treść strony:</label><br>
                <select id="rate">
                    <option value="5">Bardzo dobrze</option>
                    <option value="4">Dobrze</option>
                    <option value="3">Przeciętnie</option>
                    <option value="2">Źle</option>
                    <option value="1">Bardzo źle</option>
                </select><br>
                <label for="scale">Wybierz skalę zainteresowania astronomią (lewo-min, prawo-max):</label><br>
                <input type="range" id="scale" name="scale" min="0" max="10">
                <fieldset>
                    <legend>Wybierz swoje zainteresowania:</legend>
                    <input type="checkbox" id="stars" name="interest" value="stars">
                    <label for="stars">Gwiazdy</label><br>
                    <input type="checkbox" id="planets" name="interest" value="planets">
                    <label for="planets">Planety</label><br>
                    <input type="checkbox" id="galaxies" name="interest" value="galaxies">
                    <label for="galaxies">Galaktyki</label><br>
                    <input type="checkbox" id="tech" name="interest" value="tech">
                    <label for="tech">Technologie kosmiczne</label><br>
                    <input type="checkbox" id="other" name="interest" value="other">
                    <label for="other">Inne</label><br>
                    <label for="other_interest">Jeśli zaznaczyłeś/aś "Inne", wpisz swoje zainteresowania:</label><br>
                <input type="text" id="other_interest" name="other_interest"><br>
                </fieldset>
                <label for="comment">Wpisz dodatkowe uwagi:</label><br>
                <input type="text" id="comment" name="comment" maxlength="500"><br>
                <input type="submit" id="submit" value="Wyślij">
                <input type="reset" id="reset" value="Wyczyść">
            </form>
            <a id="top_button" href="#top">Powrót do góry strony</a>
        </main>
        <footer>
            <h4 id="contact">Kontakt</h4>
            <a href="mailto:oskarwisniewski2004@gmail.com">Email</a>
            <a href="tel:+48532602567">Nr telefonu</a>
            <a href="https://www.facebook.com/smart.skar.ymg">Facebook</a>
            <span>© Copyright 2023: Oskar Wiśniewski</span>
        </footer>
        <span id="alert">JavaScript jest wyłączony lub nieobsługiwany przez przeglądarkę. Część elementów strony nie zostanie wyświetlona.</span>
        <script src="alert.js"></script>
        <script>
            function thanks() {
                var span = document.createElement('span');
                var form = document.getElementById('ankieta');
                var message = document.createTextNode('Dziękuję Ci za poświęcony czas!');
                span.style.gridArea = 'main';
                span.style.display = 'flex';  
                span.style.justifyContent = 'center';
                span.style.textAlign = 'center';
                span.style.backgroundColor = '#5e0699';
                span.style.borderRadius = '20px';
                span.style.width = '40%';
                span.style.padding = '10px 10px';
                span.style.fontSize = '14px';
                span.appendChild(message);
                ankieta.appendChild(span);   
            }
        </script>
        <script src="data.js"></script>
        <script>
            (function ($) {
                $.fn.maxlength = function () {
                    this.each(function(){
                        let clone = $(this).clone().attr('data-role', 'maxlength');
                        let maxlength = $(this).attr('maxlength');
                        let length = $(this).val().length;
                        let replacement = $('<div></div>').append(clone).append($('<div></div>').addClass('d-flex justify-content-end small').append($('<span></span>').addClass('length').html(length)).append('/').append(maxlength));
                        $(this).replaceWith(replacement);
                    });
                };

                })(jQuery);

                $(() => {

                $(document).on('keyup', '[data-role="maxlength"]', function () {
                    let length = $(this).val().length;
                    $(this).parent().find('.length').html(length);
                });

                });

                $(() => {
                $('[maxlength]').maxlength();
            });
        </script>
        <script>
            $( function() {
                $("input[type='radio']").checkboxradio();
            });
        </script>
    </body>
</html>