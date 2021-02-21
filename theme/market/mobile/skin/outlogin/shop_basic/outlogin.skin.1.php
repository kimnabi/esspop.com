<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

<aside id="ol_before" class="ol">
    <h2>Member Login<button class="user_close"><i class="fa fa-times" aria-hidden="true"></i><span class="sound_only">메뉴닫기</span></button></h2>
    <!-- 로그인 전 외부로그인 시작 -->
    <form name="foutlogin" action="<?php echo $outlogin_action_url ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
    <fieldset>
    	<div class="ol_wr">
	        <input type="hidden" name="url" value="<?php echo $outlogin_url ?>">
	        <span class="sound_only">Member</span>
	        <input type="text" name="mb_id" id="ol_id" placeholder="Member" required maxlength="20">
	        <span class="sound_only">password</span>
	        <input type="password" id="ol_pw" name="mb_password" placeholder="password" required  maxlength="20">

	        <div id="ol_auto">
	            <input type="checkbox" id="auto_login" name="auto_login" value="1">
	            <label for="auto_login" id="auto_login_label">autologin</label>
	        </div>
	        <button type="submit" id="ol_submit" class="btn_submit">login</button>
		</div>
    </fieldset>
    </form>
    <?php
    // 소셜로그인 사용시 소셜로그인 버튼
    @include_once(get_social_skin_path().'/social_outlogin.skin.1.php');
    ?>
    <div id="ol_svc">
        <a href="<?php echo G5_BBS_URL ?>/register.php"><b>Sign Up</b></a>
        <a href="<?php echo G5_BBS_URL ?>/password_lost.php" id="ol_password_lost">Find information</a>
    </div>
</aside>

<script>
<?php if (!G5_IS_MOBILE) { ?>
$omi = $('#ol_id');
$omp = $('#ol_pw');
$omp.css('display','inline-block').css('width',104);
$omi_label = $('#ol_idlabel');
$omi_label.addClass('ol_idlabel');
$omp_label = $('#ol_pwlabel');
$omp_label.addClass('ol_pwlabel');
$omi.focus(function() {
    $omi_label.css('visibility','hidden');
});
$omp.focus(function() {
    $omp_label.css('visibility','hidden');
});
$omi.blur(function() {
    $this = $(this);
    if($this.attr('id') == "ol_id" && $this.attr('value') == "") $omi_label.css('visibility','visible');
});
$omp.blur(function() {
    $this = $(this);
    if($this.attr('id') == "ol_pw" && $this.attr('value') == "") $omp_label.css('visibility','visible');
});
<?php } ?>

$("#auto_login").click(function(){
    if (this.checked) {
        this.checked = confirm("If you use automatic login, you do not need to enter your member ID and password next time.\n\n
        Personal information may be leaked in public places, so please refrain from using it.\n\nDo you want to use automatic login?");
    }
});

function fhead_submit(f)
{
    return true;
}
</script>
<!-- 로그인 전 외부로그인 끝 -->
