<!DOCTYPE html>
<html lang="th">
  <!-- Top Head -->
  <?php @include('incs/header-top.html'); ?>
  <!-- /Top Head -->
  <script>
   $(document).ready(function(){
			 $("#nav-drop li a").removeClass("selected");
			 $('#nav-drop>li:nth-child(7)>a').addClass('selected');
	}); 
  
  </script>
  <body>

    
      <!-- Header -->
	  <?php @include('incs/header.html'); ?>
      <!-- /Header -->
      <!-- container -->
      <section id="contents">

          <div class="container bx-about">
          	<h2><a href="#" title="เกี่ยวกับเรา">เกี่ยวกับเรา <i class="icon-double-angle-right"></i></a></h2>
            <div class="inner">
			<h3>บริการ ดูหนัง (Doonee.com) คืออะไร?</h3>
        
            <p><strong>ดูหนัง (Doonee.com)</strong> คือ เว็บไซต์ที่ให้บริการดูหนังออนไลน์ผ่านอินเตอร์เน็ต ซึ่งคุณสามารถเลือกดูหนังออนไลน์ได้กว่า 5,000 ชั่วโมง คุณสามารถดูได้ทุกที่ ทุกเวลาตลอด 24 ชั่วโมง และสามารถดูได้บนหลากหลายอุปกรณ์ไม่ว่าจะเป็น คอมพิวเตอร์ PC , MAC , iPad , iPhone , Tablet รวมไปถึง Internet TV และ Android Phone(เฉพาะบางรุ่น)<p>
        
            <p>บริการดูหนังเป็นอีกทางเลือกสำหรับการดูหนังของคุณ ช่วยให้คุณไม่ต้องเสียเวลา และค่าใช้จ่ายในการเดินทางไปเช่าหนังที่ศูนย์เช่า ไม่เสียค่าปรับเวลาดูหนังเกินเวลา และยังได้ดูหนังที่มีคุณภาพความคมชัดระดับ HD หรือ DVD ไม่ต้องรอดาวน์โหลดให้เสียเวลา ไม่ต้องเปลืองพื้นที่ในการเก็บหนัง เรามีหนังให้เลือกหลายหลายแนวดูได้ไม่อั้นแบบบุฟเฟ่ต์ คุณสามารถดูหนังออนไลน์ได้ง่ายๆ เพียงแค่สมัครสมาชิก และซื้อแพคเกจกับ ดูหนัง (Doonee.com) คุณก็สามารถดูหนังได้ทันที (บริการดูหนังสามารถเข้าใช้งานได้ทั้ง www.Doonee.com ค่ะ)</p>
            
            <p><img src="img/aboutus.jpg" alt="about doone"></p>
            </div>
          </div>
		
        
          
      </section>
      <!-- /container -->
    
    <!-- footer -->
    <?php @include('incs/footer.html'); ?>
    <!-- /footer -->
	<!-- javascript -->
	<?php @include('incs/js.html'); ?>
    <!-- /javascript -->
  </body>
</html>
