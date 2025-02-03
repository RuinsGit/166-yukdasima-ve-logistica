<footer class="footer" style="background-color: {{ $themeSettings->footer_bg_color }}; color: {{ $themeSettings->footer_text_color }};">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                {!! $themeSettings->footer_text !!}
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Designed <i class="mdi mdi-heart text-danger"></i> by 
                    <a href="https://166tech.az" target="_blank" style="color: {{ $themeSettings->footer_text_color }};">166 Tech</a>
                </div>
            </div>
        </div>
    </div>
</footer>
