<?php

use Illuminate\Database\Seeder;

class DeprecationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save1=\App\Deprecation::firstOrNew(['id' =>1]);;
        $save1->id=1;
        $save1->percentage='20';
        $save1->save();
        $save1->translateOrNew('ar')->title = "الاراضي";
        $save1->save();

        $save2=\App\Deprecation::firstOrNew(['id' =>2]);;
        $save2->id=2;
        $save2->percentage='20';
        $save2->save();
        $save2->translateOrNew('ar')->title = "الانشاءات و المباني";
        $save2->save();

        $save3=\App\Deprecation::firstOrNew(['id' =>3]);;
        $save3->id=3;
        $save3->percentage='20';
        $save3->save();
        $save3->translateOrNew('ar')->title = "الالات والمعدات";
        $save3->save();

        $save4=\App\Deprecation::firstOrNew(['id' =>4]);;
        $save4->id=4;
        $save4->percentage='20';
        $save4->save();
        $save4->translateOrNew('ar')->title = "السيارات";
        $save4->save();

        $save5=\App\Deprecation::firstOrNew(['id' =>5]);;
        $save5->id=5;
        $save5->percentage='20';
        $save5->save();
        $save5->translateOrNew('ar')->title = "مصاريف ماقبل التشغيل";
        $save5->save();
    }
}
