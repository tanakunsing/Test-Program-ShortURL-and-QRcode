***โปรแกรม Short URL and แสกน QR code 

**ภาษาที่ใช้ในการสร้างโปรเจค  HTML, CSS, Javascript , PHP , sql 

**วิธีการติดตั้งเพื่อใช้งานโปรแกรม

1.ดาวน์โหลก xampp เพื่อทำการทดสอบใช้งาน 
2.เมื่อติดตั้งเสร็จ ทดสอบรัน ที่ บราวเซอร์ พิมพ์  http://localhost 
3.สร้างชื่อฐานข้อมูล urlShortener 
4.นำเข้า file  url.sql ไปที่ phpmyadmin เพื่อใช้เป็นฐานข้อมูลในการเก็บข้อมูลลลงในตางราง
5.เปิดโปรเจคและเริ่มใช้งานโปรแกรม


**ลิงค์ทดสอบสำหรับทดสอบ https://www.google.com/search?q=google&rlz=1C1CHBF_enTH1026TH1026&oq=goo&aqs=chrome.0.35i39j46i67i131i199i433i465j69i57j35i39j69i60l4.1214j0j4&sourceid=chrome&ie=UTF-8 

**ติดตั้ง composer PHP 
https://getcomposer.org/

**ใน folder Project ใช้ cmd --> cd ไปยังที่อยู่ Project 
แล้วใส่ตามด้านล่างนี้
composer require chillerlan/php-qrcode 
เพื่อเรียกใช้งาน
