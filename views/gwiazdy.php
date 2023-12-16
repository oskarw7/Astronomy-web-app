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
        <title>Gwiazdy</title>
    </head>
    <body>
        <header>
            <h1>ASTRONOMIA</h1>
        </header>
        <nav>
            <ul class="navbar">
                <li>
                    <div class="dropdown">
                        <a class="dd_button" href="index.php">Strona główna</a>
                        <svg width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16" id="IconChangeColor"> <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" id="mainIconPathAttribute" stroke-width="2" stroke="#942192" fill="#5e0699"></path> </svg>
                    <div class="dd_content">
                        <a href="index.php#omnie">O mnie</a>
                        <a href="index.php#i1">Galeria</a>
                        <a href="index.php#contact">Kontakt</a>
                    </div>
                    </div>
                </li>
                <li><a href="gwiazdy.php">Gwiazdy</a></li>
                <li><a href="ankieta.php">Ankieta</a></li>
            </ul>
        </nav>
        <main>
            <div class="text_img">
            <div class="text">
                <h4>Gwiazdy</h4>
                <p>Jednym z tematów, które zaciekawiły mnie bardziej są gwiazdy. Te pozornie nikłe, świecące punkty na niebie to tak naprawdę olbrzymy o masie setki tysięcy razy większej od masy Ziemi, generujące tak dużą siłę przyciągania, że zmuszają obiekty do obiegania ich. Żyją miliony, a nawet miliardy lat, przechodząc burzliwe przemiany (o czym powiem dalej). Gwiazdy łączą ludzi na całym świecie. Niezależnie od kultury czy pochodzenia, wszyscy możemy wspólnie podziwiać nocne niebo i marzyć o tym, co kryje się za tymi migoczącymi światłami. Gwiazdy stanowią nie tylko piękno kosmicznego pejzażu, ale również źródło tajemnicy, inspiracji i naukowych odkryć. Od zarania dziejów ludzkość obserwowała i interpretowała gwiazdy. Gwiazdy odgrywały kluczową rolę w nawigacji, przewidywaniu porach roku i tworzeniu mitologii. Każda kultura ma swoje opowieści i legendy związane z gwiazdami, co nadaje im bogatą historię i kulturowy kontekst. Gwiazdy to także źródło inspiracji zarówno dla naukowców, jak i artystów. Gwiazdy pojawiają się w literaturze, muzyce, malarstwie i filmie jako symbol tajemnicy, podróży i nieśmiertelności. Ich obecność na nocnym niebie przypomina nam, że nasza planeta jest częścią czegoś znacznie większego i bardziej niezwykłego - wszechświata.</p>
            </div>
            <img src="diagramhr.jpeg" alt="Diagram Hertzsprunga-Russella">
            </div>
            <div class="tab">
            <span>Największe znane ludzkości gwiazdy</span>
            <table>
                <tr>
                    <th>Numer</th>
                    <th>Nazwa</th>
                    <th>Promień*</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Stephenson 2-18</td>
                    <td>2150</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>LGGS J004520.67+414717.3</td>
                    <td>2126</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>VY Canis Majoris</td>
                    <td>2069</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>IRAS 05346-6949</td>
                    <td>2064</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>MY Cephei</td>
                    <td>2061</td>
            </table>
            <span>*krotność promienia Słońca</span>
            </div>
            <div class="text">
                <h4>Życie gwiazd</h4>
                <div id="accordion">
                    <h3>Diagram Hertzsprunga-Russella</h3>
                    <div>
                        <p>Diagram Hertzsprunga-Russella (HR) to narzędzie wykorzystywane w astronomii do klasyfikacji i analizy życia gwiazd na podstawie ich jasności i temperatury powierzchniowej. Diagram ten przedstawia relację między temperaturą gwiazdy a jej jasnością. Pozwala nam zrozumieć różne etapy ewolucji gwiazd, w tym ich wiek, masę, i przyszłe losy. Za pomocą tego diagramu można podzielić gwiazdy na kilka grup, które odpowiadają etapom rozwoju typowych gwiazd - ciąg główny, olbrzymy i białe karły.</p>
                    </div>
                    <h3>Ciąg główny</h3>
                    <div>
                        <p>Długość życia gwiazdy zależy w głównej mierze od jej masy. Gwiazdy cięższe żyją krócej, ale generalnie świecą jaśniej, a lżejsze - odwrotnie. Na początku jest gaz, głównie mieszanina wodoru i helu. Wskutek różnych nierówności gęstości tego gazu zaczyna on powoli na siebie spadać, tworząc coraz gęstszy rejon materii, zwany protogwiazdą aż staje się on tak gęsty i gorący, że zaczyna się w nim fuzja termojądrowa. W ten sposób powstaje gwiazda. Przez większość swojego życia będzie ona w ciągu głównym, czyli będzie spalać wodór w hel. W tej fazie jest m.in. nasze Słońce.</p>
                    </div>
                    <h3>Olbrzymy</h3>
                    <div>
                        <p>Z czasem gwiazda spala większość wodoru, a jądro gwiazdy zaczyna się ściskać, zwiększając swoją temperaturę (dogodne warunki dla fuzji termojądrowej), co powoduje syntezę helu w cięższe pierwiastki. W wyniku tego generowana jest coraz większą ilość energii. W wyniku tego gwiazda zwiększa swoją jasność i znacząco się powiększa, stając się olbrzymem lub nadolbrzymem.</p>
                    </div>
                    <h3>Koniec życia gwiazdy</h3>
                    <div>
                        <p>Gwiazdy lżejsze stają się czerwonymi olbrzymami. W kolejnych etapach swojego życia zrzucają one kolejne warstwy, a ich jądro ulega ściśnięciu. W wyniku tego gwiazda staje się białym karłem. Jest to ostatni etap życia gwiazdy, w czasie którego stygnie, zmieniając się w czarnego karła, który nie emituje już prominiowania elektromagnetycznego. We Wszechświecie nie ma jeszcze takich gwiazd, bo czas przekształcenia białego karla w czarnego szacuje się na ok. 10 bilionów lat, przy czym wiek Wszechświata to ok. 13,7 miliardów lat.</p>
                        <p>Jeżeli gwiazda jest cięższa, to jest w stanie zacząć fuzję pierwiastków cięższych od węgla, aż do żelaza, którego spalanie nie daje energii. Powoduje to nagły spadek mocy promieniowania gwiazdy, przez co ta zapada się na siebie, a następnie wybucha jako supernowa. Po wybuchu zostaje jeden z dwóch obiektów. Jeśli jądro gwiazdy miało mniej niż 3 masy Słońca, to zostaje gwiazdą neutronową. Jeśli więcej, to jądro ma tak mocną grawitację, że zapada się jeszcze bardziej, to powstaje czarna dziura - obiekt intrygujący astronomów, którego fizycznie nie można zobaczyć, bo całkowicie pochłania światło. Naukowcy snują dziesiątki teorii o fizyce wewnątrz czarnej dziury i tego, co wewnątrz niej się znajduje. Prawdopodobnie jest to zapadająca się przestrzeń, w której nie można się zatrzymać i nie można z niej uciec - ma tak silną grawitację, że nawet światło nie może z niej uciec.</p>
                    </div>
                </div>
            </div>
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
        <script src="data.js"></script>
        <script>
            $( function() {
                $( "#accordion" ).accordion({
                collapsible: true
                });
            });
        </script>
    </body>
</html>