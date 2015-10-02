<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Peserta */
/* @var $form yii\widgets\ActiveForm */

$this->registerCss(".listsemninar{
	border: 3px  solid black;
}");
$this->registerCss("input[type=checkbox]{
	background: #0000;
	height: 20px;
	width: 20px;
	display:inline-block;
	padding: 0 0 0 0px;
	border: 3px solid black;
");
?>
 <body background="http://cdc.unpar.ac.id/tiket/assets/img/backgroundfull.jpg">
 </body>

<?php $form = ActiveForm::begin(); ?>
	<div class="row">
		<div class="form col-lg-5">
			<?= Html::img('@web/assets/logoUCES.png');?>
		</div>
		<div class="form col-lg-4">
			<?= $form->field($model, 'nama')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'hp')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'email')->input('email') ?>

			<?= $form->field($model, 'universitas')->dropDownList([
					'List Universitas' => [    
						"Universitas Katolik Parahyangan / UNPAR" => "Universitas Katolik Parahyangan / UNPAR",
						"Institut Manajemen Telkom" => "Institut Manajemen Telkom",
						"Institut Pertanian Bogor" => "Institut Pertanian Bogor",
						"Institut Sains dan Teknologi Nasional" => "Institut Sains dan Teknologi Nasional",
						"Institut Seni Indonesia Denpasar" => "Institut Seni Indonesia Denpasar",
						"Institut Seni Indonesia Surakarta" => "Institut Seni Indonesia Surakarta",
						"Institut Seni Indonesia Yogyakarta" => "Institut Seni Indonesia Yogyakarta",
						"Institut Teknologi Bandung / ITB" => "Institut Teknologi Bandung / ITB",
						"Institut Teknologi Nasional" => "Institut Teknologi Nasional",
						"Institut Teknologi Sepuluh Nopember" => "Institut Teknologi Sepuluh Nopember",
						"Institut Teknologi Sumatera" => "Institut Teknologi Sumatera",
						"Institut Teknologi Telkom" => "Institut Teknologi Telkom",
						"Institut Teknologi Harapan Bangsa / ITHB" => "Institut Teknologi Harapan Bangsa / ITHB",
						"Inti College Indonesia" => "Inti College Indonesia",
						"Politeknik Manufaktur Negeri" => "Politeknik Manufaktur Negeri",
						"Politeknik Manufaktur Negeri Bandung" => "Politeknik Manufaktur Negeri Bandung",
						"Politeknik Negeri Bali" => "Politeknik Negeri Bali",
						"Politeknik Negeri Bandung" => "Politeknik Negeri Bandung",
						"Politeknik Negeri Jakarta" => "Politeknik Negeri Jakarta",
						"Politeknik Negeri Lampung" => "Politeknik Negeri Lampung",
						"Politeknik Negeri Padang" => "Politeknik Negeri Padang",
						"Politeknik Negeri Pontianak" => "Politeknik Negeri Pontianak",
						"Politeknik Negeri Sriwijaya" => "Politeknik Negeri Sriwijaya",
						"Politeknik Piksi Ganesha" => "Politeknik Piksi Ganesha",
						"Politeknik Pos Indonesia" => "Politeknik Pos Indonesia",
						"STIKES Katolik St. Vincentius a Paulo Surabaya" => "STIKES Katolik St. Vincentius a Paulo Surabaya",
						"STMIK AMIKOM YOGYAKARTA" => "STMIK AMIKOM YOGYAKARTA",
						"STMIK Likmi" => "STMIK Likmi",
						"Sekolah Tinggi Hukum Bandung" => "Sekolah Tinggi Hukum Bandung",
						"Sekolah Tinggi Ilmu Ekonomi Kertanegara Malang" => "Sekolah Tinggi Ilmu Ekonomi Kertanegara Malang",
						"Sekolah Tinggi Ilmu Ekonomi Prasetiya Mulya" => "Sekolah Tinggi Ilmu Ekonomi Prasetiya Mulya",
						"Sekolah Tinggi Ilmu Komputer Inti" => "Sekolah Tinggi Ilmu Komputer Inti",
						"Sekolah Tinggi Seni Indonesia Bandung" => "Sekolah Tinggi Seni Indonesia Bandung",
						"Sekolah Tinggi Seni Indonesia Padang Panjang" => "Sekolah Tinggi Seni Indonesia Padang Panjang",
						"Sekolah Tinggi Teknologi Tekstil" => "Sekolah Tinggi Teknologi Tekstil",
						"Sekolah Tinggi Teknologi Terpadu Nurul Fikri" => "Sekolah Tinggi Teknologi Terpadu Nurul Fikri",
						"Universitas Airlangga" => "Universitas Airlangga",
						"Universitas Andalas" => "Universitas Andalas",
						"Universitas Atmajaya Yogyakarta" => "Universitas Atmajaya Yogyakarta",
						"Universitas Bakrie" => "Universitas Bakrie",
						"Universitas Bangka Belitung" => "Universitas Bangka Belitung",
						"Universitas Bengkulu" => "Universitas Bengkulu",
						"Universitas Bengkulu" => "Universitas Bengkulu",
						"Universitas Bhayangkara Jakarta Raya" => "Universitas Bhayangkara Jakarta Raya",
						"Universitas Bina Nusantara" => "Universitas Bina Nusantara",
						"Universitas Bojonegoro" => "Universitas Bojonegoro",
						"Universitas Brawijaya" => "Universitas Brawijaya",
						"Universitas Budi Luhur" => "Universitas Budi Luhur",
						"Universitas Ciputra" => "Universitas Ciputra",
						"Universitas Diponegoro" => "Universitas Diponegoro",
						"Universitas Gadjah Mada" => "Universitas Gadjah Mada",
						"Universitas Gunadarma" => "Universitas Gunadarma",
						"Universitas Hasanuddin" => "Universitas Hasanuddin",
						"Universitas Indonesia" => "Universitas Indonesia",
						"Universitas Islam Bandung" => "Universitas Islam Bandung",
						"Universitas Islam Indonesia" => "Universitas Islam Indonesia",
						"Universitas Islam Nusantara" => "Universitas Islam Nusantara",
						"Universitas Jambi" => "Universitas Jambi",
						"Universitas Jambi" => "Universitas Jambi",
						"Universitas Jember" => "Universitas Jember",
						"Universitas Jenderal Achmad Yani" => "Universitas Jenderal Achmad Yani",
						"Universitas Juanda" => "Universitas Juanda",
						"Universitas Katolik Indonesia Atma Jaya" => "Universitas Katolik Indonesia Atma Jaya",
						"Universitas Katolik Soegijapranata" => "Universitas Katolik Soegijapranata",
						"Universitas Komputer Indonesia" => "Universitas Komputer Indonesia",
						"Universitas Kristen Duta Wacana" => "Universitas Kristen Duta Wacana",
						"Universitas Kristen Indonesia" => "Universitas Kristen Indonesia",
						"Universitas Kristen Krida Wacana" => "Universitas Kristen Krida Wacana",
						"Universitas Kristen Maranatha" => "Universitas Kristen Maranatha",
						"Universitas Kristen Petra" => "Universitas Kristen Petra",
						"Universitas Kristen Satya Wacana" => "Universitas Kristen Satya Wacana",
						"Universitas Lampung" => "Universitas Lampung",
						"Universitas Langlangbuana" => "Universitas Langlangbuana",
						"Universitas Mataram" => "Universitas Mataram",
						"Universitas Mercu Buana Yogyakarta" => "Universitas Mercu Buana Yogyakarta",
						"Universitas Mercubuana" => "Universitas Mercubuana",
						"Universitas Muhammadiyah Jakarta" => "Universitas Muhammadiyah Jakarta",
						"Universitas Muhammadiyah Yogyakarta" => "Universitas Muhammadiyah Yogyakarta",
						"Universitas Multimedia Nusantara" => "Universitas Multimedia Nusantara",
						"Universitas Muria Kudus" => "Universitas Muria Kudus",
						"Universitas Muslim Indonesia" => "Universitas Muslim Indonesia",
						"Universitas Nasional" => "Universitas Nasional",
						"Universitas Nasional Pasim" => "Universitas Nasional Pasim",
						"Universitas Negeri Jakarta" => "Universitas Negeri Jakarta",
						"Universitas Negeri Makassar" => "Universitas Negeri Makassar",
						"Universitas Negeri Malang" => "Universitas Negeri Malang",
						"Universitas Negeri Medan" => "Universitas Negeri Medan",
						"Universitas Negeri Padang" => "Universitas Negeri Padang",
						"Universitas Negeri Padang" => "Universitas Negeri Padang",
						"Universitas Negeri Semarang" => "Universitas Negeri Semarang",
						"Universitas Negeri Surabaya" => "Universitas Negeri Surabaya",
						"Universitas Negeri Surakarta Sebelas Maret" => "Universitas Negeri Surakarta Sebelas Maret",
						"Universitas Negeri Yogyakarta" => "Universitas Negeri Yogyakarta",
						"Universitas Padjadjaran" => "Universitas Padjadjaran",
						"Universitas Palangka Raya" => "Universitas Palangka Raya",
						"Universitas Pamulang" => "Universitas Pamulang",
						"Universitas Pancasila" => "Universitas Pancasila",
						"Universitas Pasundan / UNPAS" => "Universitas Pasundan / UNPAS",
						"Universitas Pelita Harapan" => "Universitas Pelita Harapan",
						"Universitas Pembangunan Jaya" => "Universitas Pembangunan Jaya",
						"Universitas Pendidikan Ganesha" => "Universitas Pendidikan Ganesha",
						"Universitas Pendidikan Indonesia / UPI" => "Universitas Pendidikan Indonesia / UPI",
						"Universitas Persada Indonesia Y.A.I" => "Universitas Persada Indonesia Y.A.I",
						"Universitas Pramita Indonesia" => "Universitas Pramita Indonesia",
						"Universitas Presiden" => "Universitas Presiden",
						"Universitas Riau" => "Universitas Riau",
						"Universitas Riau" => "Universitas Riau",
						"Universitas Sanata Dharma Yogyakarta" => "Universitas Sanata Dharma Yogyakarta",
						"Universitas Sarjanawiyata Tamansiswa" => "Universitas Sarjanawiyata Tamansiswa",
						"Universitas Serang Raya" => "Universitas Serang Raya",
						"Universitas Siliwangi" => "Universitas Siliwangi",
						"Universitas Sriwijaya" => "Universitas Sriwijaya",
						"Universitas Sriwijaya" => "Universitas Sriwijaya",
						"Universitas Sultan Ageng Tirtayasa" => "Universitas Sultan Ageng Tirtayasa",
						"Universitas Sumatera Utara" => "Universitas Sumatera Utara",
						"Universitas Surabaya" => "Universitas Surabaya",
						"Universitas Surakarta" => "Universitas Surakarta",
						"Universitas Surya" => "Universitas Surya",
						"Universitas Tarumanagara" => "Universitas Tarumanagara",
						"Universitas Teknologi Nusantara" => "Universitas Teknologi Nusantara",
						"Universitas Teknologi Yogyakarta" => "Universitas Teknologi Yogyakarta",
						"Universitas Telkom" => "Universitas Telkom",
						"Universitas Telkom" => "Universitas Telkom",
						"Universitas Terbuka" => "Universitas Terbuka",
						"Universitas Trisakti" => "Universitas Trisakti",
						"Universitas Trunojoyo" => "Universitas Trunojoyo",
						"Universitas Udayana" => "Universitas Udayana",
						"Universitas Widya Dharma" => "Universitas Widya Dharma",
						"Universitas Widyatama" => "Universitas Widyatama",
						"Universitas Lainnya" => "Universitas Lainnya",
						"Umum (Non Mahasiswa)" => "Umum (Non Mahasiswa)",
					],
				]); ?>

			<?= $form->field($model, 'jurusan')->textInput(['maxlength' => 255]) ?>

			<?= $form->field($model, 'npm')->textInput(['maxlength' => 255]) ?>
		</div>
		<div class="listsemninar col-lg-3">
			<?php
				echo $form->field($model, 'events')->checkboxList(ArrayHelper::map($model_event,"id","nama"),['separator'=>'</br></br>'])->label('<h3>List Seminar:</h3>');
			?>
		</div>
		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Daftar' : 'Update', ['class' => $model->isNewRecord ? 'btn 	btn-success btn-block' : 'btn btn-primary btn-block']) ?>
		</div>
	</div>
<?php ActiveForm::end(); ?>