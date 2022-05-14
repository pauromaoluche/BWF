<? 

$this->registerJs('
$(document).ready(function() {
    $(".filter .recent_job").click(function() {
        $(this).addClass("active").siblings().removeClass("active")
        $(".jobs").fadeOut()
        setTimeout(function() {
            $(".jobs").fadeIn()
        }, 300)

        let value = $(this).attr("data-filter")

        setTimeout(function() {
            if (value === "todos") {
                $(".jobs .recent_job").show("200")
            } else {
                $(".jobs .recent_job").not("." + value).hide("200")
                $(".jobs .recent_job").filter("." + value).show("200")
            }
        }, 350)
    })
})
')


?>
<div class="index">
    <div>
        <div class="background_menu" style="background: url('/images/site/LANDING.jpg');">
        </div>
    </div>
    <section class="section1">
        <div class="container">
            <nav class="sub_menu">
                <ul>
                    <li>
                        <p>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Manutenção
                        </p>
                    </li>
                    <li>

                        <p>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Desenvolvimento
                        </p>
                    </li>
                    <li>
                        <p>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Configuração
                        </p>
                    </li>
                    <li>
                        <div class="box">
                            <p>BWF</p>
                            <small>Soluções em t.i</small>
                        </div>
                    </li>
                    <li>
                        <p>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Suporte Tecnico
                        </p>
                    </li>
                    <li>
                        <p>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Administração
                        </p>
                    </li>
                    <li>
                        <p>
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Design
                        </p>
                    </li>
                </ul>
            </nav>

            <div class="content1_sec1">
                <div class="title text-center">
                    <h2>
                        We design digital products
                    </h2>
                </div>
                <div class="text">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </div>
            <div class="content2_sec1">
                <div class="container">
                    <nav class="sub_menu">
                        <ul>
                            <li>
                                <i class="fa-regular fa-lightbulb"></i>
                                <p>Idea</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-pen-ruler"></i>
                                <p>Design</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-brain"></i>
                                <p>development</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-gear"></i>
                                <p>settings</p>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="container d-none">
            <nav class="sub_menu">
                <ul>
                    <li>
                        <p>Manutenção</p>
                    </li>
                    <li>
                        <p>Desenvolvimento</p>
                    </li>
                    <li>
                        <p>Configuração</p>
                    </li>
                    <li>
                        <div class="box">
                            <p>BWF</p>
                            <small>Soluções em t.i</small>
                        </div>
                    </li>
                    <li>
                        <p>Suporte Tecnico</p>
                    </li>
                    <li>
                        <p>Administração</p>
                    </li>
                    <li>
                        <p>Design</p>
                    </li>
                </ul>
            </nav>

            <div class="content1_sec1">
                <div class="title text-center">
                    <h2>
                        We design digital products
                    </h2>
                </div>
                <div class="text">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div>
            </div>
            <div class="content2_sec1">
                <div class="container">
                    <nav class="sub_menu">
                        <ul>
                            <li>
                                <i class="fa-regular fa-lightbulb"></i>
                                <p>Idea</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-pen-ruler"></i>
                                <p>Design</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-brain"></i>
                                <p>development</p>
                            </li>
                            <li>
                                <i class="fa-solid fa-gear"></i>
                                <p>settings</p>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="section2">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="title">
                        <h2>We design delightful digital experiences</h2>
                    </div>
                    <div class="text">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. I</p>
                    </div>
                </div>
                <div class="col-8 d-flex  align-items-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 col-lg-4 code_language">
                                <div class="code_icon">
                                    <img class="img-fluid" src="/images/site/code/html.png">
                                </div>
                            </div>
                            <div class="col-4 col-lg-4 code_language">
                                <div class="code_icon">
                                    <img class="img-fluid" src="/images/site/code/css.png">
                                </div>
                            </div>
                            <div class="col-4 col-lg-4 code_language">
                                <div class="code_icon">
                                    <img class="img-fluid" src="/images/site/code/js.png">
                                </div>
                            </div>
                            <div class="col-4 col-lg-4 code_language">
                                <div class="code_icon">
                                    <img class="img-fluid" src="/images/site/code/vueJs.png">
                                </div>
                            </div>
                            <div class="col-4 col-lg-4 code_language">
                                <div class="code_icon">
                                    <img class="img-fluid" src="/images/site/code/php1.png">
                                </div>
                            </div>
                            <div class="col-4 col-lg-4 code_language">
                                <div class="code_icon">
                                    <img class="img-fluid" src="/images/site/code/sql.png">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section3">
        <div class="container">
            <div id="carousel_testimonials" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container content_testimonial">
                            <div class="author">
                                <img width="130" height="130" src="https://picsum.photos/200/300">
                            </div>
                            <div class="text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="by">
                                <smal>Pedro Pauluci</smal>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container content_testimonial">
                            <div class="author">
                                <img width="130" height="130" src="https://picsum.photos/200/300">
                            </div>
                            <div class="text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="by">
                                <smal>Pedro Pauluci</smal>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container content_testimonial">
                            <div class="author">
                                <img width="130" height="130" src="https://picsum.photos/200/300">
                            </div>
                            <div class="text">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                            <div class="by">
                                <smal>Pedro Pauluci</smal>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carousel_testimonials" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carousel_testimonials" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carousel_testimonials" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carousel_testimonials" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carousel_testimonials" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <section class="section4">
        <div class="container">
            <div class="title">
                <h2>Recents Works</h2>
            </div>
            <div class="filter">
                <button class="recent_job btn btn-outline-dark" data-filter="todos" type="button" >Todos</button>
                <button class="recent_job btn btn-outline-dark" data-filter="react-native" type="button" >React Native</button>
                <button class="recent_job btn btn-outline-dark" data-filter="wordpress" type="button" >Wordpress</button>
                <button class="recent_job btn btn-outline-dark" data-filter="opencart" type="button" >OpenCart</button>
                <button class="recent_job btn btn-outline-dark" data-filter="yii2" type="button" >yii2</button>
            </div>
        </div>
        <div class="gallery">
            <div class="container jobs">
                <dic class="row">
                    <div class="col-4 recent_job react-native">
                        <div class="job_img">
                            <img class="img-fluid wordpress" src="https://picsum.photos/400/200" alt="">
                        </div>
                    </div>
                    <div class="col-4 recent_job wordpress">
                        <div class="job_img">
                            <img class="img-fluid" src="https://picsum.photos/400/200" alt="">
                        </div>
                    </div>
                    <div class="col-4 recent_job react-native">
                        <div class="job_img">
                            <img class="img-fluid" src="https://picsum.photos/400/200" alt="">
                        </div>
                    </div>
                    <div class="col-4 recent_job opencart">
                        <div class="job_img">
                            <img class="img-fluid" src="https://picsum.photos/400/200" alt="">
                        </div>
                    </div>
                    <div class="col-4 recent_job yii2">
                        <div class="job_img">
                            <img class="img-fluid" src="https://picsum.photos/400/200" alt="">
                        </div>
                    </div>
                    <div class="col-4 recent_job yii2">
                        <div class="job_img">
                            <img class="img-fluid" src="https://picsum.photos/400/200" alt="">
                        </div>
                    </div>
                </dic>
            </div>
        </div>
    </section>

    <section class="section5">
        <div class="container">
            <div class="title">
                <h2>Como Funciona ?</h2>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col">
                        <div class="image"><img src="https://picsum.photos/150/150" alt=""></div>
                        <div class="title">
                            <h3><b>#1 Idea</b></h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="image"><img src="https://picsum.photos/150/150" alt=""></div>
                        <div class="title">
                            <h3><b>#2 Validação</b></h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="image"><img src="https://picsum.photos/150/150" alt=""></div>
                        <div class="title">
                            <h3><b>#3 Prototipação</b></h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="image"><img src="https://picsum.photos/150/150" alt=""></div>
                        <div class="title">
                            <h3><b>#$ Finalização</b></h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section6">
        <div class="container">
            <div class="title">
                <h2><span>Funcionalidades </span> dos sites</h2>
            </div>
            <div class="row functions">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://cdn-icons-png.flaticon.com/512/3879/3879707.png" class="img-fluid">
                        </div>
                        <div class="title">
                            <h3>Site Responsivo</h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://cdn-icons.flaticon.com/png/512/4365/premium/4365227.png?token=exp=1652538526~hmac=5f6b53f9efb27af9e6a51ef912cfa97f">
                        </div>
                        <div class="title">
                            <h3>Tecnologia de ponta</h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://cdn-icons-png.flaticon.com/512/7200/7200600.png">
                        </div>
                        <div class="title">
                            <h3>Treinamento de uso</h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://cdn-icons.flaticon.com/png/512/4480/premium/4480421.png?token=exp=1652537129~hmac=6ad60c90788e9c1aa03988af9efddc3c">
                        </div>
                        <div class="title">
                            <h3>Suporte contínuo</h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://cdn-icons-png.flaticon.com/512/2329/2329083.png">
                        </div>
                        <div class="title">
                            <h3>Facil gerenciamento</h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://cdn-icons.flaticon.com/png/512/4480/premium/4480421.png?token=exp=1652538582~hmac=32877ff8413d8dba57e28e2586193153">
                        </div>
                        <div class="title">
                            <h3>Ferramentas de venda</h3>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn">
                <button type="button" class="btn btn-primary btn-lg">Pedir orçamento</button>
            </div>
        </div>
    </section>
</div>