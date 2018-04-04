<div class="output-page page-2">
    <h3 class="icon-title">قائمة التدفقات النقدية التقديرية للمشروع</h3>
    <div class="responsive-table">
        <table class="table dark-theme output-table">
            <tr>
                <td style="width: 125px;">قائمه المركز المالى للمشروع</td>
                <td class="align-center">فتره التاسيس</td>
                <td class="align-center">السنة الأولى</td>
                <td class="align-center">السنة الثانية</td>
                <td class="align-center">السنة الثالثة</td>
                <td class="align-center">السنة الرابعة</td>
                <td class="align-center">السنة الخامسة</td>
            </tr>
        </table>
        <h3 class="table-title2">التدفقات النقديه الداخله</h3>
        <table class="table dark-theme output-table">
            <tr>
                <td>اجمالى الايرادات</td>
                <td class="align-center"></td>
                @php
                    for($i=0;$i<count($study->increases_rate);$i++)
                    {
                         $sum_rates=0;
                        foreach ($study->products as $key=>$product)
                        {
                            $sum_rates+=$product->production*12*$product->price*($study->increases_rate[$i]->percentage/100);
                        }
                        echo '<td>'.number_format($sum_rates).'</td>';
                        $profits[]=$sum_rates;
                    }
                @endphp
            </tr>
            <tr>
                <td>اجمالى الأيرادات المقبوضة</td>
                <td class="align-center"></td>
                @php
                    for($i=0;$i<count($study->increases_rate);$i++)
                    {
                         $sum_rates=0;
                        foreach ($study->products as $key=>$product)
                        {
                            $sum_rates+=$product->production*12*$product->price*($study->increases_rate[$i]->percentage/100);
                        }
                        echo '<td>'.number_format($sum_rates).'</td>';
                        $profits[]=$sum_rates;
                    }
                @endphp
            </tr>
            <tr>
                <td>{{trans('report.total_variable_costs')}}</td>
                <td class="align-center"></td>
                @foreach($study->increases_rate as $key=>$increase)
                    <td class="align-center">{{number_format(($all_expenses_sum+$sum_raw_materials_annual)*($increase->percentage/100))}}</td>
                @endforeach

            </tr>


            <tr>
                <td>{{trans('report.total_expenses')}}</td>
                <td class="align-center"></td>

            @foreach($study->increases_rate as $key=>$increase)
                    <td class="align-center">{{number_format(($all_expenses_sum+$sum_assets_deprecation+$sum_raw_materials_annual)*($increase->percentage/100))}}</td>
                    @php
                        $final_expenses[]=($all_expenses_sum+$sum_assets_deprecation+$sum_raw_materials_annual)*($increase->percentage/100);
                    @endphp
                @endforeach
            </tr>
            <tr>
                <td>المصروفات المدفوعة</td>
                <td class="align-center"></td>
                @foreach($study->increases_rate as $increase)
                    <td class="align-center">{{number_format(($total_deprecation_sums-$sum_assets_deprecation)*($increase->percentage/100)*-1 )}}</td>
                @endforeach
            </tr>
            <tr>
                <td>راس المال المدفوع</td>
                <td class="align-center">{{number_format(($final_working_capital+$fixed_capital)*($study->financeInvestments->personal_investment/100))}}</td>
                <td class="align-center"></td>
                <td class="align-center"></td>
                <td class="align-center"></td>
                <td class="align-center"></td>
                <td class="align-center"></td>
            </tr>
            <tr>
                <td>قروض ممنوحة</td>
                <td class="align-center">{{number_format($total_final_value_of_loan)}}</td>
                <td class="align-center"></td>
                <td class="align-center"></td>
                <td class="align-center"></td>
                <td class="align-center"></td>
                <td class="align-center"></td>
            </tr>
            <tr>
                <td>اجمالى التدفقات النقديه الداخله</td>
                <td class="align-center">10,489,800</td>
                <td class="align-center">10,096,242</td>
                <td class="align-center">10,727,257</td>
                <td class="align-center">11,358,272</td>
                <td class="align-center">12,620,302</td>
                <td class="align-center">12,620,302</td>
            </tr>
        </table>
        <h3 class="table-title">التدفقات النقديه الخارجه</h3>
        <table class="table dark-theme output-table">
            <tr>
                <td>الأصول الثابتة</td>
                <td class="align-center">8,986,000</td>
                <td class="align-center">-</td>
                <td class="align-center">-</td>
                <td class="align-center"></td>
                <td class="align-center"></td>
                <td class="align-center"></td>
            </tr>
            <tr>
                <td>مصروفات التأسيس</td>
                <td class="align-center">8,834,211</td>
                <td class="align-center">-</td>
                <td class="align-center"></td>
                <td class="align-center"></td>
                <td class="align-center"></td>
                <td class="align-center"></td>
            </tr>
            <tr>
                <td>الذكاه</td>
                <td class="align-center"></td>
                <td class="align-center">10,096,242</td>
                <td class="align-center">10,727,257</td>
                <td class="align-center">11,358,272</td>
                <td class="align-center">12,620,302</td>
                <td class="align-center">12,620,302</td>
            </tr>
            <tr>
                <td>توزيعات ارباح</td>
                <td class="align-center"></td>
                <td class="align-center">10,096,242</td>
                <td class="align-center">10,727,257</td>
                <td class="align-center">11,358,272</td>
                <td class="align-center">12,620,302</td>
                <td class="align-center">12,620,302</td>
            </tr>
            <tr>
                <td>اجمالى التدفقات الخارجه</td>
                <td class="align-center">8,834,211</td>
                <td class="align-center">10,096,242</td>
                <td class="align-center">10,727,257</td>
                <td class="align-center">11,358,272</td>
                <td class="align-center">12,620,302</td>
                <td class="align-center">12,620,302</td>
            </tr>
            <tr>
                <td>صافي التدفقات</td>
                <td class="align-center">8,834,211</td>
                <td class="align-center">10,096,242</td>
                <td class="align-center">10,727,257</td>
                <td class="align-center">11,358,272</td>
                <td class="align-center">12,620,302</td>
                <td class="align-center">12,620,302</td>
            </tr>
            <tr>
                <td>النقدية كما في بداية السنة</td>
                <td class="align-center"></td>
                <td class="align-center">10,096,242</td>
                <td class="align-center">10,727,257</td>
                <td class="align-center">11,358,272</td>
                <td class="align-center">12,620,302</td>
                <td class="align-center">12,620,302</td>
            </tr>
            <tr>
                <td>النقدية كما في نهاية السنة</td>
                <td class="align-center"></td>
                <td class="align-center">10,096,242</td>
                <td class="align-center">10,727,257</td>
                <td class="align-center">11,358,272</td>
                <td class="align-center">12,620,302</td>
                <td class="align-center">12,620,302</td>
            </tr>
        </table>
    </div>
    <div class="pdf-footer">
        <span>22</span>
        <i>www.gadwa.com</i>
        <img src="{{ASSETS}}/front/img/logo-new.png" alt="">
    </div>
</div>