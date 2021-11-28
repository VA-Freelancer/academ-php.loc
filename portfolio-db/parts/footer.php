    <footer class="footer">
        <div class="text-center">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">Designed with <i class="fa fa-heart"></i> by <a href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
        </div>
        <!--//container-->
    </footer>
    <!--//footer-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Авторизация</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills mb-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#" data-tab="signUp">Регистрация</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-tab="signIn">Войти</a>
                        </li>


                    </ul>
                    <ul class="auth d-flex flex-column" style="list-style: none; padding-left: 0px;">

                        <li class="nav-item" data-tab="signUp">
                            <form action="registrations.php" method="POST">
                                <div>
                                    <h5 >Зарегистрируйтесь</h5>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="user" class="form-control" autocomplete="off" placeholder="Ваш логин" required>
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" placeholder="Ваш пароль" autocomplete="off" class="form-control" required >
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password2" placeholder="Повторите пароль" autocomplete="off" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-info " style="min-width: 220px;">Зарегистрироваться</button>
                            </form>
                        </li>
                        <li class="nav-item collapse " data-tab="signIn">
                            <form action="<?=get_url("sign-in.php");?>" method="POST">
                                <div>
                                    <h5 >Авторизуйтесь</h5>
                                </div>
                                <div class="mb-3">
                                    <input type="text" name="user" class="form-control" autocomplete="off" placeholder="Ваш логин" >
                                </div>
                                <div class="mb-3">
                                    <input type="password" name="password" placeholder="Ваш пароль" autocomplete="off" class="form-control" >
                                </div>
                                <button type="submit" class="btn btn-warning" style="min-width: 220px;">Войти</button>
                            </form>
                        </li>
                    </ul>

                    <script>
                        const navPills = document.querySelector('.nav-pills');


                        navPills.addEventListener('click', (e)=>{
                            e.preventDefault();
                            if(e.target.closest('.nav-link')) {
                                const navLinks = document.querySelectorAll('.nav-link');
                                const navLinksAuth = document.querySelectorAll('.auth .nav-item');
                                if(navLinks){
                                    navLinks.forEach(el =>{
                                        el.classList.toggle('active');
                                    })
                                    navLinksAuth.forEach(el =>{
                                        el.classList.toggle('collapse');
                                    })
                                }

                            }
                        })

                    </script>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
    <!-- Javascript -->
    <script type="text/javascript" src="assets/plugins/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>