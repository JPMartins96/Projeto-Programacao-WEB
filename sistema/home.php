<?php
//inicia as variaveis de sessão
session_start();
//verifica se a sessão está iniciada e, caso não esteja, direciona para a página de login
if(!isset($_SESSION["idSessao"])){
    header('location: ../index.php');
}
//adiciona o header da página
include 'header.php';

?>
        
        <section>
            <div class="row">
                <div class="col-12">
                    <div class="slideshow-container">
                        <div class="mySlides fade">
                            <div class="numbertext">1 / 3</div>
                            <img src="../images/slideShow/img1.jpg" style="width:100%">
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">2 / 3</div>
                            <img src="../images/slideShow/img2.jpg" style="width:100%">
                        </div>

                        <div class="mySlides fade">
                            <div class="numbertext">3 / 3</div>
                            <img src="../images/slideShow/img3.jpg" style="width:100%">
                        </div>

                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>

                    </div>
                    <br>

                    <div style="text-align:center">
                        <span class="dot" onclick="currentSlide(1)"></span> 
                        <span class="dot" onclick="currentSlide(2)"></span> 
                        <span class="dot" onclick="currentSlide(3)"></span> 
                    </div>

                    <script>
                    var slideIndex = 1;
                    showSlides(slideIndex);

                    function plusSlides(n) {
                    showSlides(slideIndex += n);
                    }

                    function currentSlide(n) {
                    showSlides(slideIndex = n);
                    }

                    function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("mySlides");
                    var dots = document.getElementsByClassName("dot");
                    if (n > slides.length) {slideIndex = 1}    
                    if (n < 1) {slideIndex = slides.length}
                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";  
                    }
                    for (i = 0; i < dots.length; i++) {
                        dots[i].className = dots[i].className.replace(" active", "");
                    }
                    slides[slideIndex-1].style.display = "block";  
                    dots[slideIndex-1].className += " active";
                    }
                    </script>
                </div>
            </div>
        </section>
            
<?php
include 'footer.php';
?>
