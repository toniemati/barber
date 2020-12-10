<template>
  <div>
    <div class="showRez">
      <transition name="view">
        <section v-if="showRez" id="header">
          <div class="container">
            <img src="/img/fashion-hair.png" class="logo" alt="logo" />
            <div class="header-text">
              <h2>
                Kamil Mainka <br />
                Golibroda
              </h2>
              <span class="square"></span>
              <p>
                Co tu więcej pisać,<br />niż to że jest to wspaniały fryzjer :)
              </p>

              <button class="btn common-btn" @click="showRez = !showRez">
                Złóż rezerwacje
              </button>

              <div class="line">
                <span class="line1"></span><br />
                <span class="line2"></span><br />
                <span class="line3"></span>
              </div>
            </div>
          </div>
        </section>
      </transition>

      <transition name="view">
        <section v-if="!showRez" id="reservation">
          <div class="container reservation-row">
            <div class="reservation-left-col">
              <h1>Rezerwacja</h1>

              <form
                method="post"
                class="col-sm-12 col-md-8 col-lg-4 mx-auto"
                @submit.prevent="checkForm"
              >
                <div class="form-group text-left">
                  <label for="imie">Imie</label>
                  <input
                    id="imie"
                    v-model="user.imie"
                    type="text"
                    class="form-control"
                  />
                  <p class="text-danger pt-2" v-if="errors.imie">
                    {{ errors.imie }}
                  </p>
                </div>

                <div class="form-group text-left">
                  <label for="nazwisko">Nazwisko</label>
                  <input
                    id="nazwisko"
                    v-model="user.nazwisko"
                    type="text"
                    class="form-control"
                  />
                  <p class="text-danger pt-2" v-if="errors.nazwisko">
                    {{ errors.nazwisko }}
                  </p>
                </div>

                <div class="form-group text-left">
                  <label for="fryzjer">Fryzjer</label>
                  <select
                    v-model="user.fryzjer_id"
                    id="fryzjer"
                    class="form-control"
                  >
                    <option selected disabled>Wybierz fryzjera</option>
                    <option
                      v-for="(fryzjer, i) in fryzjerzy"
                      :key="i"
                      :value="fryzjer.id"
                    >
                      {{ fryzjer.imie + " " + fryzjer.nazwisko }}
                    </option>
                  </select>
                  <p class="text-danger pt-2" v-if="errors.fryzjer">
                    {{ errors.fryzjer }}
                  </p>
                </div>

                <div class="form-group text-left">
                  <label for="zabieg">Zabieg</label>
                  <select
                    v-model="user.zabieg_id"
                    id="zabieg"
                    class="form-control"
                  >
                    <option selected disabled>Wybierz zabieg</option>
                    <option
                      v-for="(zabieg, i) in zabiegi"
                      :key="i"
                      :value="zabieg.id"
                    >
                      {{ zabieg.name }}
                    </option>
                  </select>
                  <p class="text-danger pt-2" v-if="errors.zabieg">
                    {{ errors.zabieg }}
                  </p>
                </div>

                <div class="form-group text-left">
                  <label for="data">Data</label>
                  <input
                    id="data"
                    :min="data.min"
                    :max="data.max"
                    v-model="user.data"
                    type="date"
                    class="form-control"
                  />
                  <p class="text-danger pt-2" v-if="errors.data">
                    {{ errors.data }}
                  </p>
                </div>

                <div class="form-group text-left">
                  <label for="godzina">Godzina</label>
                  <input
                    id="godzina"
                    min="10:00"
                    max="20:00"
                    step="1800"
                    v-model="user.godzina"
                    type="time"
                    class="form-control"
                  />
                  <p class="text-danger pt-2" v-if="errors.godzina">
                    {{ errors.godzina }}
                  </p>
                  <p
                    class="text-danger pt-2 font-weight-bold text-center"
                    v-else-if="errors.busy"
                  >
                    {{ errors.busy }}
                  </p>
                </div>
                <h3 class="text-success" v-if="info">{{ info }}</h3>
                <div v-else class="btn-box">
                  <button name="submit" type="submit" class="common-btn">
                    Zarezerwuj
                  </button>
                </div>
              </form>
            </div>
            <div class="reservation-right-col">
              <img src="/img/Taking notes-amico.png" alt="rezerwacja" />
            </div>
          </div>
        </section>
      </transition>
    </div>

    <transition name="nav">
      <nav v-if="showNav" id="sideNav">
        <ul>
          <li><a href="#header">Strona główna</a></li>
          <li><a href="#reservation">Rezerwacja</a></li>
          <li><a href="#about">O Mnie</a></li>
          <li><a href="#features">Zabieg</a></li>
          <li><a href="#gallery">Galleria</a></li>
          <li><a href="#cennik">Cennik</a></li>
          <li><a href="#contact">Kontakt</a></li>
        </ul>
      </nav>
    </transition>

    <div @click="showNav = !showNav" class="hamburger">
      <div class="hline1"></div>
      <div class="hline2"></div>
      <div class="hline3"></div>
    </div>

    <section id="about">
      <div class="about-left-col">
        <img src="/img/Messenger-pana.png" alt="" />
      </div>
      <div class="about-right-col">
        <div class="about-text">
          <h1>O Mnie</h1>
          <span class="square"></span>
          <p>Patrzę na człowieka i od razu widzę, co chciałbym zrobić.</p>
          <br />
          <p>
            Podobno mam talent do przełamywania pierwszych lodów, a to bardzo
            pomaga we fryzjerstwie. Kiedy klient się staje się wyluzowany i
            otwarty, możesz go zrozumieć i lepiej obsłużyć. Zwykle od razu wiem,
            co chciałbym zrobić, ale nic na siłę. Trzeba się skonsultować, bo to
            klient ma być zadowolony.
          </p>
          <br />
          <div class="line">
            <span class="line1"></span><br />
            <span class="line2"></span><br />
            <span class="line3"></span>
          </div>
          <h2>
            Gdyby mnie dziś odcięli od roboty, chyba bym umarł. Wszystko w niej
            jest fajne – praca, kontakt z ludźmi i historie, które opowiadają.
            Słyszałem, że mam zaraźliwy entuzjazm, więc wygląda na to, że
            znalazłem się we właściwym miejscu.
          </h2>

          <h3>~~Kamil Mainka</h3>
        </div>
      </div>
    </section>

    <section id="features">
      <div class="features-row">
        <div class="feature-col">
          <img src="/img/Barber-pana.png" alt="" />
          <h4>Strzyżenie włosów</h4>
          <p>
            O jakości męskiej fryzury decyduje przede wszystkim odpowiednie
            strzyżenie.
          </p>
        </div>
        <div class="feature-col">
          <img src="/img/Barber-amico.png" alt="" />
          <h4>Stryżenie brody</h4>
          <p>Dbamy również o wasze bujnę brody</p>
        </div>
        <div class="feature-col">
          <img src="/img/Barber-bro.png" alt="" />
          <h4>Modelowanie</h4>
          <p>
            Nastały czasy, w których mężczyzna chce wyglądać wyjątkowo dobrze.
          </p>
        </div>
      </div>
    </section>

    <section id="gallery">
      <div class="container gallery-row">
        <div class="gallery-left-col">
          <div class="gallery-text">
            <h1>Galleria</h1>
            <span class="square"></span>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia
              facere nemo, magnam nam numquam perspiciatis culpa praesentium sed
              minus sit magni. Quibusdam odio nulla reiciendis sequi! Doloribus
              quidem quibusdam voluptatibus.
            </p>
          </div>
        </div>
        <div class="gallery-right-col">
          <img src="/img/Collection-pana.png" alt="" />
        </div>
      </div>
    </section>

    <section id="cennik">
      <div class="cennik-left-col">
        <img src="/img/Credit Card Payment-rafiki.png" alt="" />
      </div>
      <div class="cennik-right-col">
        <div class="cennik-text">
          <h1>Cennik</h1>
          <table>
            <tr>
              <td></td>
              <th>Pierwszy fryzjer</th>
              <th>Drugi fryzjer</th>
              <th>Trzeci fryzjer</th>
            </tr>
            <tr>
              <th>Strzyżenie męskie</th>
              <td>45zł</td>
              <td>45zł</td>
              <td>45zł</td>
            </tr>
            <tr>
              <th>Strzyżenie damskie</th>
              <td>45zł</td>
              <td>45zł</td>
              <td>45zł</td>
            </tr>
            <tr>
              <th>Golenie</th>
              <td>90zł</td>
              <td>90zł</td>
              <td>90zł</td>
            </tr>
            <tr>
              <th>Modelowanie</th>
              <td>90zł</td>
              <td>90zł</td>
              <td>90zł</td>
            </tr>
            <tr>
              <th>Loki / fale</th>
              <td>90zł</td>
              <td>90zł</td>
              <td>90zł</td>
            </tr>
          </table>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container contact-row">
        <div class="contact-left-col">
          <h1>Kontakt</h1>
          <p>ul. Gliwicka 168</p>
          <p>42-600 Tarnowskie Góry</p>
          <h2>Godziny otwarcia:</h2>
          <p>Poniedziałek - piątek: 10.00 - 20.00</p>
          <p>Sobota: 10.00 - 20.00</p>
          <p>Niedziela: 10.00 - 20.00</p>
          <p><i class="icon-phone"></i> (+48) 123-456-789</p>
          <p><i class="icon-mail-alt"></i> email@gmail.com</p>
        </div>
        <div class="contact-right-col">
          <img src="/img/City driver-pana.png" alt="" />
        </div>
      </div>
    </section>

    <section id="footer">
      <div class="container footer-row">
        <hr />
        <div class="footer-left-col">
          <div class="footer-links">
            <div class="link-title">
              <h4>About me</h4>
              <small>Ambity</small><br />
              <small>Zdolny</small>
            </div>
            <div class="link-title">
              <h4>Zabiegi</h4>
              <small>Stryżenie</small><br />
              <small>Golenie</small>
            </div>
            <div class="link-title">
              <h4>Cennik</h4>
              <small>Pierwszy fryzjer</small><br />
              <small>Drugi fryzjer</small>
            </div>
            <div class="link-title">
              <h4>Kontakt</h4>
              <small><i class="icon-phone"></i>(+48) 123-123-123</small><br />
              <small><i class="icon-mail-alt"></i>golibroda@gmail.com</small>
            </div>
          </div>
        </div>
        <div class="footer-right-col">
          <div class="footer-info">
            <div class="copyright-text">
              <small>Copyright &copy; 2020 Mateusz Kasprzak</small><br />
              <small></small>
            </div>
            <div class="footer-logo">
              <img src="/img/fashion-hair.png" alt="logo" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="social-icons">
      <a href="https://www.facebook.com/"><i class="icon-facebook"></i></a>
      <a href="https://www.instagram.com/"> <i class="icon-instagram"></i></a>
      <a href="https://www.twitter.com/"><i class="icon-twitter"></i></a>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Homepage",

    data: function() {
      return {
        info: null,
        user: {},
        errors: {},
        showNav: false,
        showRez: true,
        errors: {},
        reservations: null,
        zabiegi: null,
        user: {
          fryzjer_id: null,
          zabieg_id: null,
          imie: null,
          nazwisko: null,
          data: null,
          godzina: null
        },
        fryzjerzy: null,
        data: {
          min: null,
          max: null
        }
      };
    },

    created: function() {
      this.getReservation();
      this.getFryzjerzy();
      this.getZabiegi();
      this.setDate();
    },

    methods: {
      getReservation: function() {
        axios.get("/api/rezerwacje").then(res => (this.reservations = res.data));
      },

      getFryzjerzy: function() {
        axios.get("/api/fryzjerzy").then(res => (this.fryzjerzy = res.data));
      },

      getZabiegi: function() {
        axios.get("/api/zabiegi").then(res => (this.zabiegi = res.data));
      },

      checkForm: function(e) {
        this.info = null;
        this.errors = {};

        //* Sprawdzenie imie
        if (!this.user.imie) {
          this.errors.imie = "Imie jest wymagane!";
        } else {
          if (this.user.imie.length >= 3) {
            // console.log("Imie ok");
          } else {
            this.errors.imie = "Imie musić mieć co najmniej 3 znaki!";
          }
        }

        //* Sprawdzenie nazwiska
        if (!this.user.nazwisko) {
          this.errors.nazwisko = "Nazwisko jest wymagane!";
        } else {
          if (this.user.nazwisko.length >= 3) {
            // console.log("Nazwisko ok");
          } else {
            this.errors.nazwisko = "Nazwisko musić mieć co najmniej 3 znaki!";
          }
        }

        //* Sprawdzenie fryzjera
        if (!this.user.fryzjer_id) {
          this.errors.fryzjer = "Należy wybrać fryzjera!";
        }

        //* Sprawdzenie zabiegu
        if (!this.user.zabieg_id) {
          this.errors.zabieg = "Należy wybrać zabieg!";
        }

        //* Sprawdzenie daty i godziny
        if (!this.user.data) {
          this.errors.data = "Data rezerwacji jest wymagana!";
        }
        if (!this.user.godzina) {
          this.errors.godzina = "Godzina rezerwacji jest wymagan!";
        }

        //* Sprawdzenie czy termin jest zajęty
        let godz = this.user.godzina + ":00";
        this.reservations.forEach(res => {
          if (res.data === this.user.data && res.godzina === godz) {
            this.errors.busy =
              "Ta godzina w wybranym przez ciebie dniu jest zajęta!";
          }
        });

        //* Sprawdzenie czy sa errory, jak nie to dodajemy do bazy
        if (Object.keys(this.errors).length) {
          // console.log("sa err");
        } else {
          axios
            .post("/api/rezerwacje", this.user)
            .then(() => (this.info = "Dodano rezerwacje!"));
        }
      },

      setDate: function() {
        //* Now date
        let date = new Date();
        let year = date.getFullYear();
        let month = date.getMonth() + 1;
        let day = date.getDate();
        if (month < 10) {
          month = "0" + month;
        }
        if (day < 10) {
          day = "0" + day;
        }
        const now = year + "-" + month + "-" + day;
        this.data.min = now;

        //* in2Months
        let in2Months = new Date(year, month + 2, day);
        year = in2Months.getFullYear();
        month = in2Months.getMonth();
        day = in2Months.getDate();
        if (month < 10) {
          month = "0" + month;
        }
        if (day < 10) {
          day = "0" + day;
        }
        in2Months = year + "-" + month + "-" + day;
        this.data.max = in2Months;
      }
    }
  };
</script>

<style lang="scss" scoped>
//* ANIMATE VIEW
.view-enter-active,
.view-leave-active {
  transition: transform 1s ease-in-out;
}

.view-enter-active {
  transition-delay: 1s;
}

.view-enter {
  transform: translateX(100%);
}

.view-enter-to {
  transform: translateX(0%);
}

.view-leave {
  transform: transalteX(0%);
}

.view-leave-to {
  transform: translateX(-100%);
}

//* ANIMATE NAV
.nav-enter-active,
.nav-leave-active {
  transition: transform 0.3s;
}

.nav-enter,
.nav-leave-to {
  transform: translateX(250px);
}

.nav-enter-to,
.nav-leave {
  transform: translateX(0px);
}

* {
  font-family: "Poppins", sans-serif;
}

.showRez {
  height: 100vh;
  // width: 100%;
  overflow: hidden;
}

//! HEADER

#header {
  height: 100vh;
  left: 100%;
  background-image: url("/img/brak.png");
  background-position: center;
  background-size: cover;

  .logo {
    margin-top: 30px;
    width: 75px;
    font-size: 2rem;
    font-weight: 500;
    letter-spacing: 5px;
    animation: rotation 15s infinite;
  }

  .header-text {
    max-width: 350px;
    margin-top: 100px;
  }

  h1 {
    font-size: 2rem;
    letter-spacing: 5px;
  }

  p {
    font-size: 1rem;
    color: #777;
    line-height: 20px;
  }

  .header-text button {
    margin: 20px 0;
  }
}

.common-btn {
  padding: 18px 40px;
  background: transparent;
  outline: none;
  border: 2px solid #fa9746;
  font-weight: bold;
  cursor: pointer;
  border-radius: 5px;
}

//! REZERWACJA

#reservation {
  margin-top: 2rem;
  text-align: center;

  .reservation-row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
  }

  .reservation-left-col {
    flex-basis: 50%;
  }

  .reservation-right-col img {
    width: 100%;
  }

  .reservation-right-col {
    flex-basis: 50%;
  }

  form {
    max-width: 350px;
    margin: 30px auto;
    text-align: center;
  }

  form input {
    width: 100%;
    padding: 12px 12px;
    margin-bottom: 5px;
    outline: none;
    box-shadow: none;
    box-sizing: border-box;
    border: 2px solid #fa9746;
    cursor: pointer;
    text-transform: capitalize;
  }

  select {
    border: 2px solid #fa9746;
  }

  .btn-box {
    width: 100%;
    display: flex;
    justify-content: flex-start;
  }

  .btn-box button {
    flex-basis: 48%;
    padding: 18px 0;
    margin: 10px 0;
  }
}

.square {
  height: 12px;
  width: 12px;
  display: inline-block;
  background: #fa9746;
  margin: 10px 0;
}

.line1 {
  width: 15px;
  height: 15px;
  background: #fa9746;
  display: inline-block;
}

.line2 {
  width: 80px;
  height: 1px;
  background: #fa9746;
  display: inline-block;
}

.line3 {
  width: 60px;
  height: 1px;
  background: #fa9746;
  display: inline-block;
}

.line {
  line-height: 8px;
}

//! SIDENAV

#sideNav {
  width: 250px;
  height: 100vh;
  position: fixed;
  right: 0px;
  top: 0;
  background: #fa9746;
  // transition: 0.5s;
}

nav ul li {
  list-style: none;
  margin: 50px 20px;
}

nav ul li a {
  text-decoration: none;
  color: #e7ecff;
  transition: 0.2s;
}

nav ul li a:hover {
  color: #fff;
  font-size: 1.15rem;
}

.hamburger {
  width: 60px;
  position: fixed;
  right: 35px;
  top: 35px;
  z-index: 2;
  cursor: pointer;
  background: #fa9746;

  div {
    width: 40px;
    height: 2px;
    background-color: #fff;
    margin: 10px;
  }
}

//! ABOUT

#about {
  padding: 100px 0;
  display: flex;
  align-items: center;
  flex-wrap: wrap;

  .about-left-col {
    flex-basis: 50%;
  }

  .about-left-col img {
    width: 100%;
  }

  .about-right-col {
    flex-basis: 50%;
    text-align: right;
  }

  .about-text {
    max-width: 500px;
    margin-right: 100px;
    display: inline-block;
  }

  .about-text h2 {
    margin: 40px 0 10px;
    font-size: 1.2rem;
    font-style: italic;
  }

  .about-text h3 {
    font-size: 1rem;
    font-style: italic;
    color: #797979;
  }
}

//! FEATURES

#features {
  padding: 50px 0;

  .features-row {
    width: 80%;
    margin: auto;
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-wrap: wrap;
  }

  .feature-col {
    flex-basis: 25%;
    text-align: center;
  }

  .feature-col img {
    width: 85%;
  }

  .feature-col h4 {
    margin-bottom: 15px;
    font-size: 1.5rem;
    font-weight: 400;
  }
}

//! GALLERY

#gallery {
  padding: 100px 0;

  .gallery-row {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
  }

  .gallery-left-col {
    flex-basis: 50%;
  }

  .gallery-right-col {
    flex-basis: 50%;
  }

  .gallery-right-col img {
    width: 100%;
  }

  .gallery-text {
    max-width: 350px;
  }
}

//! CENNIK

#cennik {
  padding: 100px 0;
  display: flex;
  align-items: center;
  flex-wrap: wrap;

  .cennik-left-col {
    flex-basis: 50%;
    text-align: center;
  }

  .cennik-left-col img {
    width: 100%;
  }

  .cennik-right-col {
    flex-basis: 50%;
    text-align: right;
  }

  .cennik-text {
    max-width: 500px;
    margin-right: 100px;
    display: inline-block;
  }

  .cennik-right-col table {
    margin: 2rem auto;
    border-collapse: collapse;
    background: transparent;
  }

  .cennik-right-col table th {
    text-align: center;
    padding: 1rem;
    color: #d8843f;
  }

  .cennik-right-col table td {
    text-align: center;
    padding: 1rem;
    text-align: center;
  }

  .cennik-right-col tr:nth-child(2n) {
    background-color: #f0f0f0;
  }

  .cennik-right-col tr:hover {
    background-color: #dcdcdc;
    cursor: pointer;
  }
}

//! CONTACT

.contact-row {
  display: flex;
  align-items: center;
  flex-wrap: wrap;

  .contact-left-col,
  .contact-right-col {
    flex-basis: 50%;
  }

  .contact-right-col img {
    width: 100%;
  }

  .contact-left-col h1 {
    font-size: 2rem;
    letter-spacing: 5px;
  }

  .contact-left-col h2 {
    margin-top: 30px;
  }

  .contact-left-col p {
    font-size: 1rem;
    margin: 10px;
  }
}

//! FOOTER

#footer {
  padding: 50px 0 30px;

  hr {
    width: 100%;
    border: 0;
    border-top: 1px solid #fa9746;
  }

  .footer-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  .footer-left-col {
    flex-basis: 50%;
    margin-top: 60px;
  }

  .footer-right-col {
    flex-basis: 35%;
    margin-top: 30px;
  }

  .footer-links {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  .link-title h4 {
    color: #fa9746;
    margin-bottom: 20px;
  }

  .link-title small {
    font-size: 0.8rem;
    color: #777;
  }

  .footer-info {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  .footer-logo {
    text-align: center;
  }

  .footer-logo img {
    width: 50%;
  }

  .copyright-text,
  .footer-logo {
    flex-basis: 40%;
  }
}

//! SOCIAL

.social-icons {
  text-align: center;
  width: 50px;
  position: fixed;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
  z-index: 1;
  background: transparent;

  i {
    font-size: 1.5rem;
    display: block;
    margin: 0 auto 20px;
    cursor: pointer;
  }
}
</style>