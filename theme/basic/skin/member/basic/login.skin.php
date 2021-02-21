<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$member_skin_url.'/style.css">', 0);
?>

<!-- 로그인 시작 { -->
<div id="mb_login" class="mbskin">
    <div class="mbskin_box">
        <h1><?php echo $g5['title'] ?></h1>
        <div class="mb_log_cate">
            <h2><span class="sound_only">회원</span>login</h2>
            <a href="<?php echo G5_BBS_URL ?>/register.php" class="join">Sign Up</a>
        </div>
        <form name="flogin" action="<?php echo $login_action_url ?>" onsubmit="return flogin_submit(this);" method="post">
        <input type="hidden" name="url" value="<?php echo $login_url ?>">

        <fieldset id="login_fs">
            <legend>Member Login</legend>
            <label for="login_id" class="sound_only">member<strong class="sound_only"> necessary</strong></label>
            <input type="text" name="mb_id" id="login_id" required class="frm_input required" size="20" maxLength="20" placeholder="아이디">
            <label for="login_pw" class="sound_only">password<strong class="sound_only"> necessary</strong></label>
            <input type="password" name="mb_password" id="login_pw" required class="frm_input required" size="20" maxLength="20" placeholder="비밀번호">
            <button type="submit" class="btn_submit">login</button>

            <div id="login_info">
                <div class="login_if_auto chk_box">
                    <input type="checkbox" name="auto_login" id="login_auto_login" class="selec_chk">
                    <label for="login_auto_login"><span></span> log in automatically</label>
                </div>
                <div class="login_if_lpl">
                    <a href="<?php echo G5_BBS_URL ?>/password_lost.php" target="_blank" id="login_password_lost">Find information</a>
                </div>
            </div>
        </fieldset>
        </form>
        <?php @include_once(get_social_skin_path().'/social_login.skin.php'); // 소셜로그인 사용시 소셜로그인 버튼 ?>
    </div>

    <?php // 쇼핑몰 사용시 여기부터 ?>
    <?php if ($default['de_level_sell'] == 1) { // 상품구입 권한 ?>

	<!-- 주문하기, 신청하기 -->
	<?php if (preg_match("/orderform.php/", $url)) { ?>
    <section id="mb_login_notmb">
        <h2>Non-member purchase</h2>
        <p>When ordering as a non-member, there is a confirmation procedure before delivery</p>

        <div id="guest_privacy">
            <?php echo conv_content($default['de_guest_privacy'], $config['cf_editor']); ?>
        </div>

		<div class="chk_box">
			<input type="checkbox" id="agree" value="1" class="selec_chk">
        	<label for="agree"><span></span> I have read and agree to the collection of personal information.</label>
		</div>

        <div class="btn_confirm">
            <a href="javascript:guest_submit(document.flogin);" class="btn_submit">Purchase as a non-member</a>
        </div>

        <script>
        function guest_submit(f)
        {
            if (document.getElementById('agree')) {
                if (!document.getElementById('agree').checked) {
                    alert("You must read and agree to the contents of personal information collection.");
                    return;
                }
            }

            f.url.value = "<?php echo $url; ?>";
            f.action = "<?php echo $url; ?>";
            f.submit();
        }
        </script>
    </section>

    <?php } else if (preg_match("/orderinquiry.php$/", $url)) { ?>
    <div id="mb_login_od_wr">
        <h2>Non-member order inquiry </h2>

        <fieldset id="mb_login_od">
            <legend>Non-member order inquiry</legend>

            <form name="forderinquiry" method="post" action="<?php echo urldecode($url); ?>" autocomplete="off">

            <label for="od_id" class="od_id sound_only">Order number<strong class="sound_only"> necessary</strong></label>
            <input type="text" name="od_id" value="<?php echo get_text($od_id); ?>" id="od_id" required class="frm_input required" size="20" placeholder="주문서번호">
            <label for="od_pwd" class="od_pwd sound_only">password <strong>necessary</strong></label>
            <input type="password" name="od_pwd" size="20" id="od_pwd" required class="frm_input required" placeholder="비밀번호">
            <button type="submit" class="btn_submit">확인</button>

            </form>
        </fieldset>

        <section id="mb_login_odinfo">
            <p>Please enter your <strong>order number</strong> and <strong>password</strong>correctly.</p>
        </section>

    </div>
    <?php } ?>

    <?php } ?>
    <?php // 쇼핑몰 사용시 여기까지 반드시 복사해 넣으세요 ?>

</div>

<script>
jQuery(function($){
    $("#login_auto_login").click(function(){
        if (this.checked) {
            this.checked = confirm("If you use automatic login, you do not need to enter your member ID and password next time.\n\n
            Personal information may be leaked in public places, so please refrain from using it.\n\nDo you want to use automatic login?");
        }
    });
});

function flogin_submit(f)
{
    if( $( document.body ).triggerHandler( 'login_sumit', [f, 'flogin'] ) !== false ){
        return true;
    }
    return false;
}
</script>
<!-- } 로그인 끝 -->
