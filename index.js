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
        "https://img.icons8.com/ios/125/000000/one-free.png",
        "https://img.icons8.com/ios/125/000000/virus-free.png",
        "https://img.icons8.com/ios/125/000000/no-gluten.png",
        "https://img.icons8.com/ios/125/000000/flicker-free.png",
        "https://img.icons8.com/ios/125/000000/no-gmo.png",
        "https://img.icons8.com/ios/125/000000/open-source.png",
        "https://img.icons8.com/ios/125/000000/drop-zone.png",
        "https://img.icons8.com/ios/125/000000/joomla.png"
    ],
    // 6x6
    [
        "https://img.icons8.com/ios/125/000000/real-estate-agent.png",
        "https://img.icons8.com/ios/125/000000/broom-with-a-lot-of-dust.png",
        "https://img.icons8.com/ios/125/000000/interview.png",
        "https://img.icons8.com/ios/125/000000/spill.png",
        "https://img.icons8.com/ios/125/000000/global-warming.png",
        "https://img.icons8.com/ios/125/000000/milk-carton.png",
        "https://img.icons8.com/ios/125/000000/stadium-.png",
        "https://img.icons8.com/ios/125/000000/history-book.png",
        "https://img.icons8.com/ios/125/000000/alcohol-bottle.png",
        "https://img.icons8.com/ios/125/000000/how-quest.png"
    ]
]

var imgElements = [];

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

function changeLeaderboard(btn) {
    var content4 = document.getElementById('content4')
    var content6 = document.getElementById('content6')
    if (btn.id == '4x4') {
        content4.style.display = "";
        content6.style.display = "none";
    } else {
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
            img.classList.add("img-thumbnail")
            var cell = row.insertCell(0); // Tehdään Cell meidän Row:iin
            cell.style.border = "solid 1px black"; // Asetetaan css
            cell.appendChild(img); // Lisätään kuva meidän Cell elementtiin
            if(w == 4){ // 4x4
                cell.style.width = "125px" // Asetetaan leveys
                cell.style.height = "125px" // Asetetaan korkeus
            }else{ // 6x6
                cell.style.width = "100px" // Asetetaan leveys
                cell.style.height = "100px" // Asetetaan korkeus
                document.getElementById('topDiv').style.paddingTop = '25px'
            }
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
    var text = document.getElementById('wonGame'); // Otetaan voitto teksti
    btn.style.display = "";
    text.style.display = "";
    text.innerHTML += document.getElementById("sw-time").innerHTML;
    timer.stop() // Pysäytetään kello
}

function copyContent() {
    document.getElementById("u_score_value").value = document.getElementById("sw-time").innerHTML;

}


// Ajastin
var timer = {
    etime: null, // holds HTML time display
    timer: null, // timer object
    now: 0, // current timer
    init: function() {
        // Kerätään HTML elementit
        timer.etime = document.getElementById("sw-time");

        timer.start()
    },

    /* [ACTIONS] */
    tick: function() {

        // Lasketaan aika
        timer.now++;
        var remain = timer.now;
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
        timer.etime.innerHTML = hours + ":" + mins + ":" + secs;
    },

    start: function() {
        // Aloitus funktio

        timer.timer = setInterval(timer.tick, 1000);

    },

    stop: function() {
        // Lopetus funktio

        clearInterval(timer.timer);
        timer.timer = null;
    },

};


function resetFS(){
    first = 0;
    second = 0;
}

// Funktio kun pelikorttia painaa
function check(a) {
    if (first != 0 && second != 0) {
    } else {
        if (startTimer == 0) { // Katsotaan onko tämä ihan ensimmäinen valinta pelaajalta, jos on. Käynnistetään kello
            timer.init()
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
            if (first == second) { // Jos samaa kuvaa ruutua painetaan 2 kertaa
                return
            }
            imgEl.style.display = "block" // Asetetaan kuva näkyviin
            if (first.src === second.src) { // Jos ensimmäisen ja toisen <img> elementin src url on samat, tarkoittaa että käyttäjä löysi parin
                // Nollataan variablet
                correctAnswers += 1
                resetFS()
                if (correctAnswers == gameSize) {
                    processWin()
                }
                return // Palautetaan tyhjää, eikä aseteta kuvia piiloon enään.
            } else { // Jos kuvat eivät ole samat

                setTimeout(
                    function(first, second) {
                        first.style.display = "none";
                        second.style.display = "none";
                        resetFS()

                    }, 800, first, second) // first ja second setTimeout funktion lopussa on variablet function():lle
                // Nollataan variablet

            }

        }
    }


}
