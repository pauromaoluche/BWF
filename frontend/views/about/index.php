<div class="about">
    <div class="background_menu" style="background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.6)), url(https://images.pexels.com/photos/1714208/pexels-photo-1714208.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940);">
        <div class="content">
            <div class="title">
                <h2>Sobre nós</h2>
            </div>
            <ul class="breadcrumb justify-content-center">
                <li><a href="/">Home</a></li>
                <li>Sobre nós</li>
            </ul>
        </div>
    </div>

    <section class="section1">
        <div class="container">
            <div class="row">
                <div class="title col-md-12">
                    <h2>BWF Soluções em T.I</h2>
                </div>
                <div class="col-md-6">
                    <div class="titlte-text right">
                        <h3>Nossas Propostas</h3>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="titlte-text left">
                        <h3>Nossos metodos</h3>
                        <p>
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section2">
        <div class="container d-flex">
            <div class="image">
                <img src="https://picsum.photos/500/600">
            </div>
            <div class="content">
                <? foreach ($text1 as $text) :?>
                <div class="container">
                    <div class="title">
                        <h2><?= $text->title ?></h2>
                    </div>
                    <div class="text">
                        <p><?= $text->text ?></p>
                    </div>
                </div>
                <? endforeach ?>
            </div>
        </div>
    </section>
    <section class="section3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="container">
                        <div class="title">
                            <h2>Missão</h2>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <div class="title">
                            <h2>Visão</h2>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="container">
                        <div class="title">
                            <h2>Válores</h2>
                        </div>
                        <div class="text">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="teste d-none">
        <div class="container cont-load">
            <div class="loader">
                <span>
                </span>
            </div>
        </div>
    </div>
</div>