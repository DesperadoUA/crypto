<?php
trait Airdrop {
    public function airdropCard(AirdropCardItem $post):string {
        $str = "<article class='airdrop_card'>
            <div class='airdrop_card_col'>
                <img src='{$post->thumbnail}' class='airdrop_card_logo' alt='Logo {$post->title}' width='50' height='50' />
                <a href='{$post->permalink}' class='airdrop_card_permalink'>{$post->title}</a>
            </div>
            <div class='airdrop_card_col'>";
        foreach($post->activity as $activity) {
            $str .= "<div class='airdrop_card_activity'>
                        {$activity}
                    </div>";
        }
        $str .= "</div>";
        if(!empty($post->ecosystem)) {
            $str .= "<div class='airdrop_card_col'>
                <div class='airdrop_card_value'>
                    <a href='{$post->ecosystem->permalink}'>{$post->ecosystem->title}</a>
                </div>
            </div>";
        }
        $str .= "
            <div class='airdrop_card_col'>
                <div class='airdrop_card_value'>
                    {$post->bonus}
                </div>
            </div>
            <div class='airdrop_card_col'>
                <div class='airdrop_card_award'>
                    {$post->projectAward}
                </div>
            </div>
            <div class='airdrop_card_col airdrop_card_action'>
                <button data-href='{$post->ref}' class='airdrop_card_btn ref_activate btn_primary'>
                    {$this->getTranslate('GO_TO')}
                </button>
                <a href='{$post->permalink}' class='airdrop_card_btn btn_secondary'>
                    {$this->getTranslate('REVIEW')}
                </a>
            </div>
             <div class='airdrop_card_status {$post->statusKey}'>{$post->status}</div>
        </article>";
        return $str;
    }
    public function airdropLoop(AirdropCardList $list):string {
        $str = "<section class='section_padding'><div class='container airdrop_container'>";
        foreach($list->posts as $item) $str .= $this->airdropCard($item);
        $str .= "</div></section>";
        return $str;
    }
    public function airdropCardTop(AirdropCardTop $data):string {
        $str = "<section class='section_padding'>
                    <div class='container airdrop_card_top'>";
        $col_1 = "<div class='airdrop_col col_1'>
                    {$this->picture($data->thumbnail)}
                    <div class='airdrop_col_title'>{$data->title}</div>
                  </div>";
        $str .= $col_1;
        $col_2 = "<div class='airdrop_col col_2'>
                    <a href='{$data->ecosystem->permalink}' class='airdrop_col_ecosystem'>{$data->ecosystem->title}</a>
                  </div>";
        $str .= $col_2;
        $col_3 = "<div class='airdrop_col col_3'>
                    <div class='airdrop_col_bonus'>{$data->projectAward}</div>
                    <div class='airdrop_col_bonus'>{$data->bonus}</div>
                  </div>";
        $str .= $col_3;
        $activity = join(", ", $data->activity);
        $col_4 = "<div class='airdrop_col col_4'>
                    <div class='airdrop_col_activity'>{$activity}</div>
                  </div>";
        $str .= $col_4;
        $col_5 = "<div class='airdrop_col col_5'>
                    <div class='airdrop_col_action'>
                        <button data-href='{$data->ref}' class='btn_secondary ref_activate'>{$this->getTranslate('GO_TO')}</button>
                    </div>
                  </div>";
        $str .= $col_5;
        $str .= "</div></section>"; 
        return $str;
    }
}