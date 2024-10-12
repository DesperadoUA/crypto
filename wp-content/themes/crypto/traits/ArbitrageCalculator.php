<?php
trait ArbitrageCalculator {
    public function arbitrageCalculator():string {
        $str = "<div class='arbitrage_calculator'>
            <div class='input_row'>
                <div class='input_wrapper'>
                    <label for='price_1'>{$this->getTranslate('COST_CURRENCY_FIRST_EXCHANGE')}</label>
                    <input type='number' name='price_1' id='price_1' class='input' value='0' />
                </div>
                <div class='input_wrapper'>
                    <label for='price_2'>{$this->getTranslate('COST_CURRENCY_SECOND_EXCHANGE')}</label>
                    <input type='number' name='price_2' id='price_2' class='input' value='0' />
                </div>
            </div>
            <div class='calculate_sub_title'>{$this->getTranslate('COMMISSION_SIZE')}</div>
            <div class='input_row'>
                <div class='input_wrapper'>
                    <label for='sales_commission'>{$this->getTranslate('SALES_COMMISSION')}</label>
                    <input type='number' name='sales_commission' id='sales_commission' class='input' value='0' />
                </div>
                <div class='input_wrapper'>
                    <label for='withdrawal'>{$this->getTranslate('WITHDRAWAL')}</label>
                    <input type='number' name='withdrawal' id='withdrawal' class='input' value='0' />
                </div>
                <div class='input_wrapper'>
                    <label for='purchase_commission'>{$this->getTranslate('PURCHASE_COMMISSION')}</label>
                    <input type='number' name='purchase_commission' id='purchase_commission' class='input' value='0' />
                </div>
            </div>
            <div class='input_row action_row'>
                <div>{$this->getTranslate('PROFIT_MARGIN')}: <span class='text_black' id='result'>0</span></div>
                <button class='btn_primary' id='calculate_btn'>{$this->getTranslate('CALCULATE')}</button>
            </div>
        </div>";
        return $str;
    }
}