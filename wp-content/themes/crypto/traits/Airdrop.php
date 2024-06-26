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
                <a href='{$post->ref}' class='airdrop_card_btn btn_primary'>
                    {$this->getTranslate('GO_TO')}
                </a>
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
}