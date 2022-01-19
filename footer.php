

    <footer>
        <div class="container-fluid">
            <div class="col-md-12">
                <p> <?php if(empty(get_theme_mod('footer_text'))){
                    echo "Copyright &copy; 2021 Darkblog | Designed by Showkat Sumon";
                }else{
                    echo get_theme_mod('footer_text');
                } ?>
                </p>
            </div>
        </div>
    </footer>

    <?php wp_footer();?>
</body>
</html>