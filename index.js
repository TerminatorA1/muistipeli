// Alku variablet jotta voidaan pitää käyttäjän valinnoista kirjaa.
var first = 0;
var second = 0;
var startTimer = 0
var correctAnswers = 0
var gameSize = 18
// Kuvat
var imgs = [
    // 4x4
    [
        "https://img.icons8.com/ios/100/000000/one-free.png",
        "https://img.icons8.com/ios/100/000000/virus-free.png",
        "https://img.icons8.com/ios/100/000000/no-gluten.png",
        "https://img.icons8.com/ios/100/000000/flicker-free.png",
        "https://img.icons8.com/ios/100/000000/no-gmo.png",
        "https://img.icons8.com/ios/100/000000/open-source.png",
        "https://img.icons8.com/ios/100/000000/drop-zone.png",
        "https://img.icons8.com/ios/100/000000/joomla.png"
    ],
    // 6x6
    [
        "https://img.icons8.com/ios/100/000000/real-estate-agent.png",
        "https://img.icons8.com/ios/100/000000/broom-with-a-lot-of-dust.png",
        "https://img.icons8.com/ios/100/000000/interview.png",
        "https://img.icons8.com/ios/100/000000/spill.png",
        "https://img.icons8.com/ios/100/000000/global-warming.png",
        "https://img.icons8.com/ios/100/000000/milk-carton.png",
        "https://img.icons8.com/ios/100/000000/stadium-.png",
        "https://img.icons8.com/ios/100/000000/history-book.png",
        "https://img.icons8.com/ios/100/000000/alcohol-bottle.png",
        "https://img.icons8.com/ios/100/000000/how-quest.png"
    ]
]


// Otetaan meidän ruudukko
const myTable = document.getElementById('myTable');

// Jyrin antama sekoitus funktio
function sekoita(taulukko) {
    taulukko.sort(function(a, b) {
        return 0.5 - Math.random()
    });
    return taulukko;
}

// Tehdään meidän rivit
window.onload = function() {
    myTable.style.display = "none" // Piilotetaan taulukko ennenkun pelaaja on valinnut pelimuodon
}

function changeLeaderboard(btn){
    var content4 = document.getElementById('content4')
    var content6 = document.getElementById('content6')
    if(btn.id == '4x4'){
        content4.style.display = "";
        content6.style.display = "none";
    }else{
        content4.style.display = "none";
        content6.style.display = "";
    }
}


function createPlayfield(element, w, h) {
    document.getElementById('gamemode').value = element.id // Tallenetaan pelin koko piilossa olevaan teksti kenttään jotta voidaan käyttää sitä server.php tiedostossa

    myTable.style.display = "" // Näytetään taulukko
    // Piilotetaan pelimuodon teksti ja nappulat
    document.getElementById('4x4').style.display = "none"
    document.getElementById('6x6').style.display = "none"
    document.getElementById('modeText').style.display = "none"
    if (w == 4) { // Jos pelaaja on painanut 4x4 nappulaa
        imgs = sekoita(sekoita(imgs[0]).concat(sekoita(imgs[0])));
        gameSize = 8;
    } else { // Jos pelaaja ei painanut 4x4 nappulla niin pelin koko on 6x6
        imgs = [...imgs[0], ...imgs[1]]
        imgs = sekoita(sekoita(imgs).concat(sekoita(imgs)))
        gameSize = 18;
    }

    var imgCount = 0 // Otetaan laskua että mikä index on menossa imgs taulukossa
    for (var i = 0; i < h; i++) { // Tehdään rows
        var row = myTable.insertRow(0) // Luodaan row meidän ruudukkoon
        row.style.border = "solid 1px black" // Asetetaan css
        for (var k = 0; k < w; k++) { // Luodaan meidän cells meidän row:iin
            var img = document.createElement('img'); // Tehdään img elementti
            img.src = imgs[imgCount]; // Asetetaan kuva img elementtiin
            img.style.display = "none"; // Piilotetaan img elementti
            var cell = row.insertCell(0); // Tehdään Cell meidän Row:iin
            cell.style.border = "solid 1px black"; // Asetetaan css
            cell.appendChild(img); // Lisätään kuva meidän Cell elementtiin
            cell.style.width = "100px" // Asetetaan leveys
            cell.style.height = "100px" // Asetetaan korkeus
            imgCount++ // Lisätään meidän laskuriin 1
        }
    }
    var cells = document.getElementsByTagName('td'); // Otetaan kaikki Cell elementit
    for (let item of cells) {
        item.addEventListener('click', (e) => { // Lisätään jokaiseen Cell elementtiin on.click tapahtuma
            check(e.target) //
        })
    }
}


function processWin() {
    var btn = document.getElementById('submitTime'); // Otetaan submit nappula ja laitetaan se näkyviin pelaajalle
    btn.style.display = "block";
    sw.stop() // Pysäytetään kello
}

function copyContent() {
    document.getElementById("u_score_value").value = document.getElementById("sw-time").innerHTML;

}


/* Otettu netistä ja muokattu vain että voidaan testata ajan tallenusta,
oma luodaan loppu versioon
Linkki sivulle: https://code-boxx.com/simple-javascript-stopwatch/
*/
var sw = {
    /* [INIT] */
    etime: null, // holds HTML time display
    erst: null, // holds HTML reset button
    ego: null, // holds HTML start/stop button
    timer: null, // timer object
    now: 0, // current timer
    init: function() {
        // Get HTML elements
        sw.etime = document.getElementById("sw-time");

        sw.start()
    },

    /* [ACTIONS] */
    tick: function() {
        // tick() : update display if stopwatch running

        // Calculate hours, mins, seconds
        sw.now++;
        var remain = sw.now;
        var hours = Math.floor(remain / 3600);
        remain -= hours * 3600;
        var mins = Math.floor(remain / 60);
        remain -= mins * 60;
        var secs = remain;

        // Update the display timer
        if (hours < 10) {
            hours = "0" + hours;
        }
        if (mins < 10) {
            mins = "0" + mins;
        }
        if (secs < 10) {
            secs = "0" + secs;
        }
        sw.etime.innerHTML = hours + ":" + mins + ":" + secs;
    },

    start: function() {
        // start() : start the stopwatch

        sw.timer = setInterval(sw.tick, 1000);

    },

    stop: function() {
        // stop() : stop the stopwatch

        clearInterval(sw.timer);
        sw.timer = null;
    },

    reset: function() {
        // reset() : reset the stopwatch

        // Stop if running
        if (sw.timer != null) {
            sw.stop();
        }

        // Reset time
        sw.now = -1;
        sw.tick();
    }
};

/* Kopioitu kohta loppuu tässä */


// Funktio kun pelikorttia painaa
function check(a) {
    if (startTimer == 0) { // Katsotaan onko tämä ihan ensimmäinen valinta pelaajalta, jos on. Käynnistetään kello
        sw.init()
        startTimer = 1 // Muutetaan startTimer muuttuja, jotta kello ei lähde uudelleen käyntiin
    }
    var cn = a.childNodes // Otetaan <th> elementin sisällä olevat elementit. Tämä palauttaa [text, img, text]

    var imgEl = cn[0] // Otetaan ensimmäinen elementti joka on <img>
    if (cn[0] == undefined) {
        return
    }
    // Jos ei ole asetettu ensimmäistä elementtiä, se tarkoittaa että tämä on ensimmäinen valinta käyttäjältä
    if (first == 0) {
        first = imgEl // Asetetaan ensimmäinen valinta <img> elementiksi
        imgEl.style.display = "block" // Asetetaan kuva näkyviin pelaajalle
    } else { // Jos tämä ei ole käyttäjän ensimmäinen valinta
        second = imgEl // Asetetaan toinen valinta <img> elementiksi
        if (first == second) {
            return
        }
        imgEl.style.display = "block" // Asetetaan kuva näkyviin
        if (first.src === second.src) { // Jos ensimmäisen ja toisen <img> elementin src url on samat, tarkoittaa että käyttäjä löysi parin
            // Nollataan variablet
            first = 0;
            second = 0;
            correctAnswers += 1
            if (correctAnswers == gameSize) {
                processWin()
            }
            return // Palautetaan tyhjää, eikä aseteta kuvia piiloon enään.
        } else { // Jos kuvat eivät ole samat
            setTimeout(
                function(first, second) {
                    first.style.display = "none";
                    second.style.display = "none"
                }, 800, first, second) // first ja second setTimeout funktion lopussa on variablet function():lle

            // Nollataan variablet
            first = 0;
            second = 0;
        }

    }

}
