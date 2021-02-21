<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}

define("_INDEX_", TRUE);

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>
<section id="idx_banner">
	
<div id="main_bn">
	<div class="bx-wrapper" style="max-width: 100%;">
	<div class="bx-viewport" style="width: 100%; overflow: hidden; position: relative; height: 500px;">
		<ul class="slide-wrap" style="display: block; width: 415%; position: relative; transition-duration: 0s; transform: translate3d(-2520px, 0px, 0px);">
			<li class="bn_first bx-clone" style="float: left; list-style: none; position: relative; width: 1260px;">
			<img src="http://www.sejongkmart.com/theme/market/img/banner/140.png" class="bn-img"/></li>
                                                                                               
			<li class="bn_first" style="float: left; list-style: none; position: relative; width: 1260px;">
				<img src="http://www.sejongkmart.com/theme/market/img/banner/141.png"class="bn-img"/></li>
			<li class="bn_first" style="float: left; list-style: none; position: relative; width: 1260px;">
				<img src="http://www.sejongkmart.com/theme/market/img/banner/140.png" class="bn-img"/></li>
			<li class="bn_first bx-clone" style="float: left; list-style: none; position: relative; width: 1260px;">
			    <img src="http://www.sejongkmart.com/theme/img/market/banner/140.png" class="bn-img"/></li>
    </div>
    <div class="bx-controls bx-has-controls-direction">
	    <div class="bx-controls-direction">
	        <a class="bx-prev" href="<?php echo G5_URL; ?>/">Prev</a>
	        <a class="bx-next" href="<?php echo G5_URL; ?>/">Next</a>
	    </div>
	</div>
	<div id="bx_pager" class="bx_pager">
	<ul>
	    <li> <a data-slide-index="0" href="<?php echo G5_URL; ?>/" class="">마켓테마 PC 메인2</a></li>
        <li> <a data-slide-index="1" href="<?php echo G5_SHOP_URL; ?>/" class="active">마켓테마 PC 메인</a></li>
    </ul>
    </div>
</div>
</div>

<script>
jQuery(function($){
    var slider = $('.slide-wrap').show().bxSlider({
        speed:800,
        pagerCustom: '#bx_pager',
        auto: true,
        useCSS : true,
        onSlideAfter : function(){
            //slider.startAuto();
        }
    });
});
</script>

	<div id="idx_bn_link">
		<div id="bn_cnt_link">
			<ul>
				<li><a href=""><i class="fas fa-shopping-basket"></i><br>사용후기</a></li>
				<li><a href=""><i class="fas fa-gift"></i><br>이벤트</a></li>
				<li><a href=""><i class="fas fa-grin-alt"></i><br>커뮤니티</a></li>
				<li><a href=""><i class="fas fa-comment-dots"></i><br>문의</a></li>
			</ul>
		</div>
	</div>
</section>
<?php if($default['de_type4_list_use']) { ?>
<!-- 인기상품 시작 { -->
<section class="main">
	<div class="sale_prd">
        <h2><a href="<?php echo shop_type_url('4'); ?>">인기상품</a></h2>
		<?php
		$list = new item_list();
		$list->set_type(4);
		$list->set_view('it_img', true);
		$list->set_view('it_id', false);
		$list->set_view('it_name', true);
		$list->set_view('it_basic', true);
		$list->set_view('it_cust_price', false);
		$list->set_view('it_price', true);
		$list->set_view('it_icon', true);
		$list->set_view('sns', false);
		$list->set_view('star', true);
		echo $list->run();
		?>
	</div>
</section>
<!-- } 인기상품 끝 -->
<?php } ?>

<?php if($default['de_type2_list_use']) { ?>
<section class="main2">
    <h2><a href="<?php echo shop_type_url('2'); ?>" class="main_tit">추천상품</a></h2>
    <p>SIR 마켓에서 추천해드리는 상품입니다.</p>
	<!-- 추천상품 시작 { -->
	<div class="sct_wrap">
	    <?php
	    $list = new item_list();
	    $list->set_type(2);
	    $list->set_view('it_id', false);
	    $list->set_view('it_name', true);
	    $list->set_view('it_basic', true);
	    $list->set_view('it_cust_price', true);
	    $list->set_view('it_price', true);
	    $list->set_view('it_icon', true);
	    $list->set_view('sns', true);
	    $list->set_view('star', true);
	    echo $list->run();
	    ?>
    </div>
    <!-- } 추천상품 끝 -->
</section>
<?php } ?>

<section class="main3">
	<h2 class="main_tit">이벤트 기획전</h2>
	<?php include_once(G5_SHOP_SKIN_PATH.'/boxevent.skin.php'); // 이벤트 ?> 
</section>

<section class="main4">
	<?php if($default['de_type1_list_use']) { ?>
	<!-- 히트상품 시작 { -->
	<h2><a href="<?php echo shop_type_url('4'); ?>" class="main_tit">히트상품</a></h2>
    <?php
    $list = new item_list();
    $list->set_type(1);
    $list->set_view('it_img', true);
    $list->set_view('it_id', false);
    $list->set_view('it_name', true);
    $list->set_view('it_basic', true);
    $list->set_view('it_cust_price', true);
    $list->set_view('it_price', true);
    $list->set_view('it_icon', false);
    $list->set_view('sns', false);
    echo $list->run();
    ?>
	<!-- } 히트상품 끝 -->
	<?php } ?>
</section>

<script>
$("#container_inner").removeClass("container").addClass("idx-container");
</script>

<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>