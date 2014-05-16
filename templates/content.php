<table id="table">
    <tr>
        <td id="td_left">
            <div id="logo_block">
                <div id="logo_image"></div>
                <div class="title"><h3><?=$title?></h3></div>
            </div>
            <div id="form_block">
                <input type="button" class="btnStyle" value="Показать все метки"  id="btn_show_all"/>

                <p class="form_text">Тип:</p>
                <input type="radio" name="type" value="all" class="rg_type css-checkbox" id="r_all" checked/><label for="r_all" class="css-label">Все</label><Br>
                <input type="radio" name="type" value="mosque" class="rg_type css-checkbox" id="r_mosque"/><label for="r_mosque" class="css-label">Мечети</label><Br>
                <input type="radio" name="type" value="prayerroom" class="rg_type css-checkbox" id="r_prroom"/><label for="r_prroom" class="css-label">Намазкана</label>

                <p class="form_text">Метки:</p>
                <input type="radio" name="gender" value="all" class="rg_gender css-checkbox" id="r_alltype" checked/><label for="r_alltype" class="css-label">Все</label><Br>
                <input type="radio" name="gender" value="male" class="rg_gender css-checkbox" id="r_male"/><label for="r_male" class="css-label">Мужские</label><Br>
                <input type="radio" name="gender" value="female" class="rg_gender css-checkbox" id="r_female"/><label for="r_female" class="css-label">Женские</label>

                <p class="form_text">Показывать ближайщие:</p>
                <input type="radio" name="count" value="1" class="rg_count css-checkbox" id="r_1" checked="checked"/><label for="r_1" class="css-label">1 метку</label><Br>
                <input type="radio" name="count" value="3" class="rg_count css-checkbox" id="r_3"/><label for="r_3" class="css-label">3 метки</label><Br>
                <input type="radio" name="count" value="5" class="rg_count css-checkbox" id="r_5"/><label for="r_5" class="css-label">5 меток</label><Br>
                <input type="radio" name="count" value="10" class="rg_count css-checkbox" id="r_10"/><label for="r_10" class="css-label">10 меток</label>
                <br/>
                <br/>
                <input type="button" class="btnStyle" value="Очистить"  id="btn_clear"/>
            </div>
            <div id="ajax-load-gif"></div>
        </td>
        <td>
        </td>
        <td id="td_right">
            <div class="shadow"></div>
            <div id="map" class="context-menu-one"></div>
        </td>	
    </tr>
</table>
<div id='ajax-load'><div id='ajax-load-back'></div><div id="ajax-load-gif"></div></div>