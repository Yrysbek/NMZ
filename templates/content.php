<div id="content">
    <div id="left-block">
        <div id="logo-block">
            <div id="logo-image"></div>
            <span class="title"><?php echo $lang['title']; ?></span>
        </div>
        <div id="lang"><a href="language.php?lang=ru">ru</a> | <a href="language.php?lang=en">en</a> | <a href="language.php?lang=kg">kg</a></div>
        <div id="form-block">
            <input type="button" class="btnStyle" value="<?php echo $lang['btn_show_all']; ?>"  id="btn_show_all"/>

            <p class="form-text"><?php echo $lang['filter_type']; ?>:</p>
            <input type="radio" name="type" value="all" class="rg_type css-checkbox" id="r_all" checked/><label for="r_all" class="css-label"><?php echo $lang['type_all']; ?></label><Br>
            <input type="radio" name="type" value="mosque" class="rg_type css-checkbox" id="r_mosque"/><label for="r_mosque" class="css-label"><?php echo $lang['type_mosque']; ?></label><Br>
            <input type="radio" name="type" value="prayerroom" class="rg_type css-checkbox" id="r_prroom"/><label for="r_prroom" class="css-label"><?php echo $lang['type_proom']; ?></label>

            <p class="form-text"><?php echo $lang['filter_gender']; ?>:</p>
            <input type="radio" name="gender" value="all" class="rg_gender css-checkbox" id="r_alltype" checked/><label for="r_alltype" class="css-label"><?php echo $lang['gender_joint']; ?></label><Br>
            <input type="radio" name="gender" value="male" class="rg_gender css-checkbox" id="r_male"/><label for="r_male" class="css-label"><?php echo $lang['gender_male']; ?></label><Br>
            <input type="radio" name="gender" value="female" class="rg_gender css-checkbox" id="r_female"/><label for="r_female" class="css-label"><?php echo $lang['gender_female']; ?></label>
            
            <input type="button" class="btnStyle" value="<?php echo $lang['btn_show_all_by_filter']; ?>"  id="btn_filter"/>

            <p class="form-text"><?php echo $lang['filter_count']; ?>:</p>
            <input type="radio" name="count" value="1" class="rg_count css-checkbox" id="r_1" checked="checked"/><label for="r_1" class="css-label"><?php echo $lang['count_1']; ?></label><Br>
            <input type="radio" name="count" value="3" class="rg_count css-checkbox" id="r_3"/><label for="r_3" class="css-label"><?php echo $lang['count_3']; ?></label><Br>
            <input type="radio" name="count" value="5" class="rg_count css-checkbox" id="r_5"/><label for="r_5" class="css-label"><?php echo $lang['count_5']; ?></label><Br>
            <input type="radio" name="count" value="10" class="rg_count css-checkbox" id="r_10"/><label for="r_10" class="css-label"><?php echo $lang['count_10']; ?></label>
            <br>
            <input type="button" class="btnStyle" value="<?php echo $lang['btn_clear']; ?>"  id="btn_clear"/>
        </div>
        <div class="footer">
            <script type="text/javascript">(function() {
                if (window.pluso)if (typeof window.pluso.start == "function") return;
                if (window.ifpluso==undefined) { window.ifpluso = 1;
                  var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                  s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                  s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                  var h=d[g]('body')[0];
                  h.appendChild(s);
                }})();</script>
            <div id="social-share">
                <div class="pluso" data-background="transparent" data-options="small,round,line,horizontal,counter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print" data-url="http://mapapp.url.ph"></div>
            </div>
            <div id="play-google">
                <a href="http://play.google.com">
                    <img src="https://developer.android.com/images/brand/ru_generic_rgb_wo_45.png"></img>
                </a>
            </div>
        </div>
    </div>
    <div id="map-block">
        <div id="map" class="context-menu-one"></div>
    </div>
    <div class="panel">
	<p><?php echo $lang['help_content']; ?></p>
    </div>
<a class="trigger" href="#"><?php echo $lang['btn_help']; ?></a>
</div>
<div id='ajax-load'><div id='ajax-load-back'></div><div id="ajax-load-gif"></div></div>