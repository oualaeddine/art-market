<?php

namespace Database\Seeders;

use App\Modules\SettingsLogic\Models\Setting;
use Illuminate\Database\Seeder;

class TCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(['name' => 't_n_c_fr','value' => '<div class="ptb-30 prl-30">
                <h3 class="t-uppercase h-title mb-40">TERMES ET CONDITIONS
                </h3>
                <h4 class="mb-20">1 - Donec bibendum libero id arcu tincidunt ornare.</h4>
                <p class="mb-20">Nam at condimentum diam, vitae suscipit leo. Aliquam vel erat a turpis faucibus dapibus. Donec rutrum congue metus, fringilla eleifend quam luctus vitae. Morbi mi mauris, ullamcorper quis erat id, rutrum tempor leo. Nunc sit amet erat nibh. Sed vel mauris felis. Nulla nulla magna, porta sit amet semper ut, molestie at mi. Sed venenatis volutpat lobortis. Donec mattis fringilla arcu, id rhoncus est pharetra a. Etiam ut euismod tellus. Proin sagittis mauris tortor, sit amet vulputate turpis tincidunt sed. Etiam a consectetur enim, tristique malesuada ipsum. Maecenas vel placerat sapien. Nam et ultricies orci. Ut bibendum accumsan laoree.</p>
                <p class="mb-20">Maecenas in mattis justo. Nulla aliquam dictum erat, vitae maximus sem interdum ut. Sed sollicitudin tempus accumsan. Vivamus eget dui at ligula semper aliquam eu vel erat. Sed sed mi molestie, eleifend nunc eu, finibus lorem. Morbi ulputate interdum finibus. Vestibulum bibendum iaculis dui sed ornare. Proin nec finibus mi. Sed odio diam, pharetra at dapibus nec, commodo quis risus. Cras et dui vitae lacus luctus maximus id sed erat. Maecenas dignissim malesuada elit, sit amet efficitur est suscipit nec. Sed quis rutrum libero. Nullam a lacus hendrerit, vestibulum nisi a, dictum quam.</p>
                <h4 class="mb-20">2 - Maecenas in mattis justo. Nulla aliquam dictum erat.</h4>
                <p class="mb-20">Aliquam et mattis nulla, vel molestie nulla. Suspendisse leo dui, sagittis auctor turpis ut, egestas non maximus enim. Aenean rutrum a magna eget scelerisque. Nulla magna diam, venenatis sit amet orci sed, dapibus imperdiet leo.Donec condimentum neque non efficitur rhoncus. Maecenas facilisis magna at tempor pulvinar.Sed sit amet nunc egestas, blandit arcu quis.</p>
                <ul class="list-styled mb-20">
                    <li>Nulla aliquam dictum erat, vitae maximus sem interdum ut.</li>
                    <li> Proin nec finibus mi. Sed odio diam.</li>
                    <li>Maecenas dignissim malesuada elit, sit amet efficitur est suscipit nec</li>
                    <li>Maecenas in mattis justo.</li>
                    <li> Proin nec finibus mi. Sed odio diam.</li>
                </ul>
                <h4 class="mb-20">3 - Aenean placerat condimentum enim.</h4>
                <p class="mb-20">Aenean blandit congue libero, sed consectetur nisl gravida et. Vestibulum eget velit diam. Cras id nunc bibendum, condimentum purus id, quam. Nulla facilisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec vel elementum odio, eu congue velit Fusce dapibus diam at nunc auctor pharetra. In tempus orci id volutpat fermentum.</p>
            </div>' ]);



        Setting::create(['name' => 't_n_c_ar','value' => '     <div class="ptb-30 prl-30">
                <h3 class="t-uppercase h-title mb-40">الأحكام والشروط</h3>
                <h4 class="mb-20">1 - خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني .</h4>
                <p class="mb-20">خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد، مما يجعله أكثر من 2000 عام في القدم. قام البروفيسور "ريتشارد ماك لينتوك" (Richard McClintock) وهو بروفيسور اللغة اللاتينية في جامعة هامبدن-سيدني في فيرجينيا بالبحث عن أصول كلمة لاتينية غامضة في نص لوريم إيبسوم وهي "consectetur"، وخلال تتبعه لهذه الكلمة في الأدب اللاتيني اكتشف المصدر الغير قابل للشك. فلقد اتضح أن كلمات نص لوريم إيبسوم تأتي من الأقسام 1.10.32 و 1.10.33 من كتاب "حول أقاصي الخير والشر" (de Finibus Bonorum et Malorum) للمفكر شيشيرون (Cicero) والذي كتبه في عام 45 قبل الميلاد. هذا الكتاب هو بمثابة مقالة علمية مطولة في نظرية الأخلاق، وكان له شعبية كبيرة في عصر النهضة. السطر الأول من لوريم إيبسوم "Lorem ipsum dolor sit amet.." يأتي من سطر في القسم 1.20.32 من هذا الكتاب.</p>
                <p class="mb-20">هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي. وبالتالي يكون النص الناتح خالي من التكرار، أو أي كلمات أو عبارات غير لائقة أو ما شابه. وهذا ما يجعله أول مولّد نص لوريم إيبسوم حقيقي على الإنترنت.</p>
                <h4 class="mb-20">2 - هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم.</h4>
                <p class="mb-20">هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة في هذا النص. بينما تعمل جميع مولّدات نصوص لوريم إيبسوم على الإنترنت على إعادة تكرار مقاطع من نص لوريم إيبسوم نفسه عدة مرات بما تتطلبه الحاجة، يقوم مولّدنا هذا باستخدام كلمات من قاموس يحوي على أكثر من 200 كلمة لا تينية، مضاف إليها مجموعة من الجمل النموذجية، لتكوين نص لوريم إيبسوم ذو شكل منطقي قريب إلى النص الحقيقي.</p>
                <ul class="list-styled mb-20">
                    <li>لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام "هنا يوجد محتوى نصي</li>
                    <li>هنا يوجد محتوى نصي" فتجعلها تبدو (أي الأحرف) وكأنها نص مقروء. العديد من برامح النشر المكتبي.</li>
                    <li>على مدى السنين ظهرت نسخ جديدة ومختلفة من نص لوريم إيبسوم</li>
                    <li>أحياناً عن طريق الصدفة، وأحياناً عن عمد كإدخال بعض العبارات الفكاهية إليها.</li>
                    <li> ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة.</li>
                </ul>
                <h4 class="mb-20">3 - خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً.</h4>
                <p class="mb-20">فلقد اتضح أن كلمات نص لوريم إيبسوم تأتي من الأقسام 1.10.32 و 1.10.33 من كتاب "حول أقاصي الخير والشر" (de Finibus Bonorum et Malorum) للمفكر شيشيرون (Cicero) والذي كتبه في عام 45 قبل الميلاد. هذا الكتاب هو بمثابة مقالة علمية مطولة.</p>
            </div>' ]);



    }
}
