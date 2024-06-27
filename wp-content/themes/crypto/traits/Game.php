<?php
trait Game {
    public function gameCard(GameCardItem $post) {
        $str = "<article class='game_card'> 
                   <div class='game_card_left'>
                       <figure>
                            <img src='{$post->thumbnail}' width='237' height='187' 
                                class='game_card_thumbnail' loading='lazy'
                                alt='Game {$post->title}'
                            />
                            <figcaption>";
        if(!empty($post->ecosystem)) $str .= "<a href='{$post->ecosystem->permalink}' class='game_card_subtitle'>{$post->ecosystem->title}</a>";
        $str .= "</figcaption>
                        </figure>
                   </div>
                   <div class='game_card_right'>
                       <a href='{$post->permalink}' class='game_card_title'>{$post->title}</a>
                       <div class='game_card_value'>{$post->bonus}</div>
                       <div class='game_card_text'>{$post->excerpt}</div>
                        <footer class='game_card_footer'>
                            <a href='{$post->ref}' target='_blank' class='btn_primary'>{$this->getTranslate('PLAY')}</a>
                            <a href='{$post->permalink}' class='btn_secondary'>{$this->getTranslate('REVIEW')}</a>
                        </footer>
                   </div>
               </article>";
        return $str;
    }
    public function gameLoop(GameCardList $list) {
        $str = "<div class='game_loop_row'>";
        foreach ($list->posts as $item) $str .= $this->gameCard($item);
        $str .= "</div>";
        return $str;
    }
    public function gameCardTop(GameCardTop $data) {
        $str =  "<section class='section_padding'>
            <div class='container'>
                <div class='game_top'><div class='game_top_left'>";
        $str .= $this->picture($data->thumbnail);
        $str .= "</div>";
        $str .= "<div class='game_top_right'>";
        $str .= "<div class='game_top_title'>";
        $str .= $data->title;
        $str .= "</div>";
        $str .= "<div class='game_top_ecosystem'>";
        $str .= "<a href='{$data->ecosystem->permalink}'>";
        $str .= $data->ecosystem->title;
        $str .= "</a>";
        $str .= "</div>";
        $str .= "<div class='game_top_value'>";
        $str .= $data->bonus;
        $str .= "</div>";
        $str .= "<div class='game_top_action'>";
        $str .= "<a href='{$data->ref}' class='game_top_action_btn btn_secondary'>"; 
        $str .= $this->getTranslate('PLAY');
        $str .= "</a>"; 
        $str .= "</div>";
        $str .= "</div>";
        $str .= "</div>
            </div>
        </section>";
        return $str;
    }
}