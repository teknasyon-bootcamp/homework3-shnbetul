<?php

/**
 * UML diyagramında yer alan Form sınıfını oluşturmanız beklenmekte.
 * 
 * Sınıf içerisinde static olmayan `fields`, `action` ve `method`
 * özellikleri (property) olması gerekiyor.
 * 
 * Sınıf içerisinde static olan ve Form nesnesi döndüren `createPostForm`,
 * `createGetForm` ve `createForm` methodları bulunmalı. Bu metodlar isminde de
 * belirtilen metodlarda Form nesneleri oluşturmalı.
 * 
 * Sınıf içerisinde bir "private" başlatıcı (constructor) bulunmalı. Bu başlatıcı
 * içerisinden `action` ve `method` değerleri alınıp ilgili property'lere değerleri
 * aktarılmalıdır.
 * 
 * Sınıf içerisinde static "olmayan" aşağıdaki metodlar bulunmalıdır.
 *   - `addField` metodu `fields` property dizisine değer eklemelidir.
 *   - `setMethod` metodu `method` propertysinin değerini değiştirmelidir.
 *   - `render` metodu form'un ilgili alanlarını HTML çıktı olarak verip bir buton çıktıya eklemelidir.
 * 
 * Sonuç ekran görüntüsüne `result.png` dosyasından veya `result.html` dosyasından ulaşabilirsiniz.
 * `app.php` çalıştırıldığında `result.html` ile aynı çıktıyı verecek şekilde geliştirme yapmalısınız.
 * 
 * > **Not: İsteyenler `app2.php` ve `form2.php` isminde dosyalar oluşturup sınıfa farklı özellikler kazandırabilir.
 */
class Form{
 private array $fields=[]; //property tanımladım
 
 private function __construct(    //private constructor oluşturdum
      
    private string $action,
    private string $method
       ){}
 
 public static function createForm(string $acrion, string $method):Form{  //Form oluşturan fonksiyon
     return new static($action,$method);

 }
 public static function createGetForm(string $action):Form{
     return new static($action, "GET");
 }
 public static function createPostForm(string $action):Form{
     return new static($action,"POST");
 }

 public function addField(string $label, string $name, ?string $defaultValue=null):void{
     $field=[
         "label" => $label,
         "name" => $name,
         "value" => $defaultValue,
     ];
     $this-> fields[] = $field;
 }

 public function setMethod(string $method):void{
     $this-> method = $method;
 }

 public function render():void{
     echo "<form action= '$this-> action' method='$this-> method'>";

     foreach($this-> fields as $field){
         echo "\t<label for='" .$field["name"]. "'>" . $field["label"] . "</label>";
         echo "\t<input type= 'text' name'" . $field["name"] . "'value=" . $field["value"] . "'/>";
     }

     echo "\t<button type='submit'>GÖNDER</button>";
     echo "</form>";
 }

}

