<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="360713.png" type="image/x-icon">
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <title>Strona główna</title>
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
                <h4 id="omnie">O mnie</h4> 
                <p>Moje zainteresowanie astronomią rozpoczęło się w liceum. Jego początkiem było nierozumienie materiału na fizyce. Przerabialiśmy dział o grawitacji i astronomii pod koniec pierwszego roku szkolnego, w związku z czym to niezrozumienie nie zostało zweryfikowane. Mimo tego myślałem o tym przez sporą część wakacji. W końcu postanowiłem kupić „Krótką historię czasu” Stephena Hawkinga. Do czytania podszedłem z lekkim zniechęceniem, bo jeśli prosty materiał na fizyce nie był dla mnie klarowny, to co dopiero książka napisana przez kogoś, kogo można nazwać geniuszem. Jednak, ku mojemu zaskoczeniu, tekst był niezwykle przejrzysty. Z zaciekawieniem brnąłem przez kolejne działy, po między którymi poszerzałem wiedzę, szukając wyjaśnień w internecie. Niestety książki nie udało mi się dokończyć ze względu na rozpoczęcie kolejnego roku szkolnego i natłok lektur. Jednak zaciekawienie pozostało i dało efekty w ostatniej klasie liceum. Podczas powtórek do egzaminu z fizyki rozszerzonej znalazłem materiały, które uporządkowały i poszerzyły moją wiedzę. Niemożliwe do ruszenia zadania i zagadnienia teoretyczne stały się zrozumiałe, a co najważniejsze - ciekawe. Jednak nie to jest wyrazem mojego zainteresowania. Są nim myśli o wielkości otaczającej mniej rzeczywistości, jej różnorodności, zdumienie jej pięknem, może czasem przerażenie.</p>
                </div>
                <img src="hawking.jpeg" alt="Krótka historia czasu">
            </div>
            <div class="text">
                <h4>Fascynacja rzeczywistością</h4>
                <p>Dlaczego Wszechświat jest tak fascynujący? Wszechświat swoją wielkością przerasta naszą ludzką wyobraźnię. Niezliczone galaktyki, gwiazdy i planety tworzą widok, który nie ma końca. Podkreślają to ciągłe nowe odkrycia, dzięki którym pogłębianie wiedzy o kosmosie staje się studnią bez dna. Mimo pozoru ogromu wiadomości, które dotychczas zebraliśmy o otaczającej nas rzeczywistości, tak naprawdę ludzkość pozna ułamek jej zawartości. Wszechświat kryje w sobie wiele niezbadanych tajemnic, które inspirują naukowców i badaczy do podejmowania wyzwań. Czarne dziury, ciemna materia, zagadka ciemnej energii - to tylko niektóre z niezrozumianych aspektów kosmosu, które skłaniają naukowców do głębszych badań. Każde odkrycie stawia nowe pytania i otwiera nowe obszary do badania.</p>
                <p>Mimo tego, że zwykle kojarzymy Wszechświat z przyszłością, ze względu na poziom technologii, na której agencje bazują, pozwala on nam wędrować miliardy lat wstecz. Gdy obserwujemy odległe galaktyki, widzimy światło, które podróżowało przez kosmos przez miliardy lat. To jakby podróż w przeszłość, która pozwala nam zrozumieć historię kosmosu. Ponadto, patrzenie w gwiazdy z myślą, że w chwili obecnej widzimy przeszłość może przyprawić o zawrót głowy.</p>
                <p>Wszechświat jest fascynujący, bo otwiera przed nami nieskończoną przestrzeń do odkryć, zagadek do rozwiązania i inspiracji do głębszego zrozumienia przyrody. To jest jedno z najwspanialszych wyzwań, które stawia przed nami ludzka ciekawość i pasja do poznawania nieznanego. Niezwykła jest również jego dwoista natura - przyszłość i historia, nowe odkrycia i zagadki nie do rozwiązania, rozwój i bariery, których człowiek nigdy nie przekroczy.</p>
            </div>
            <div id="gallery">
                <img id="i1" src="blackhole.jpeg" alt="Czarna dziura" onclick="img_open('blackhole.jpeg')">
                <img id="i2" src="blackhole2.jpeg" alt="Czarna dziura" onclick="img_open('blackhole2.jpeg')">
                <img id="i3" src="milkyway.jpg" alt="Droga mleczna" onclick="img_open('milkyway.jpg')">
                <img id="i4" src="pillars.png" alt="Filary stworzenia" onclick="img_open('pillars.png')">
                <img id="i5" src="supernova.jpeg" alt="Supernowa" onclick="img_open('supernova.jpeg')">
                <img id="i6" src="supernova2.jpeg" alt="Supernowa" onclick="img_open('supernova2.jpeg')">
            </div>
            <div id="zoom">
                <img id="zoomed" src="blackhole.jpeg" alt="Czarna dziura">
                <span onclick="img_close()"><img src="close.ico" alt="Ikona zamknięcia"></span>
            </div>
            <span id="hide_button">Schowaj</span>
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
            var zoom = document.getElementById("zoom");
            var zoomed = document.getElementById("zoomed");

            function img_open(path) {
                zoomed.src=path;
                zoom.style.display="flex";
            }

            function img_close() {
                zoom.style.display="none";
            }
        </script>
        <script src="data.js"></script>
        <script>
            $('#hide_button').click(function(){
                $('#gallery').toggle("slow");
            });
        </script>
    </body>
</html>