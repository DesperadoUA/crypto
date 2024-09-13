<?php
trait Reviews {
     public function reviewsLoop(ReviewItemList $list) {
        $str = '';
        foreach($list->posts as $item) {
            $str .= "<div class='comments_row'>
				<div class='comments_row_info'>
				    <div class='comments_row_name' itemprop='author' itemscope='' itemtype='https://schema.org/Person'>
						<span itemprop='name'>{$item->author}</span>
					</div>
					<div class='comments_row_data' itemprop='datePublished' content='{$item->date}'>{$item->date}</div>
				</div>
				<div class='comments_row_desc' itemprop='reviewBody'>{$item->content}
                </div>
                <div class='comments_row_answer_link'>
                    <a href='#comment_form_ajax' 
                        data-parentid='{$item->id}' 
                        class='parent_link_comment'>
                            {$this->getTranslate('ANSWER')}
                    </a>
                </div>";
            foreach($item->relativeComments->posts as $children) {
                $str .= "<div class='comments_row comments_row_answer'>
					<div class='comments_row_info'>
						<div class='comments_row_name' itemprop='author' itemscope='' itemtype='https://schema.org/Person'>
							<span itemprop='name'>{$children->author}</span>
						</div>
						<div class='comments_row_data' itemprop='datePublished' content='{$children->date}'>{$children->date}</div>
					</div> 
					<div class='comments_row_desc' itemprop='reviewBody'>
                        {$children->content}
                    </div>
				</div>";
            }
            $str .= "</div>";
        }
        return $str;
    }
    public function reviewsForm($postId) {
        return "<div class='form_container'>
            <div class='form_title'>{$this->getTranslate('LEAVE_REVIEW')}</div>
            <form class='comment_form_ajax' id='comment_form_ajax'>
                <div class='comment_form_info'>
                    <div class='comment_form_input_wrapper'>
                        <input id='author' 
                            name='author' 
                            type='text' 
                            value=''
                            class='comment_form_name input_name'
                            required='required'
                            autocomplete='off'
                            placeholder='{$this->getTranslate('NAME')}'
                            data-type='review'
                        >
                    </div>
                    <div class='comment_form_input_wrapper'>
                        <input id='email' 
                            name='email' 
                            type='text' 
                            value=''
                            class='comment_form_email input_email'
                            required='required'
                            autocomplete='off'
                            placeholder='Email'
                            data-type='review'
                        >
                    </div>
                </div>
                <div class='comment_form_comment'>
                    <textarea
                        id='comment'
                        name='comment'
                        placeholder='{$this->getTranslate('TEXT_REVIEW')}'
                        class='comment_form_text textarea_comment'
                        required='required'
                        data-type='review'
                    ></textarea>
                </div>
                <div class='form_submit'>
                    <input type='submit' 
                        name='submit' 
                        id='submit' 
                        class='submit_ajax_comment'
                        data-postid='{$postId}'
                        value='{$this->getTranslate('SEND')}'
                        data-type='review'
                    >
                </div>
                <div class='error' data-type='review'></div>
            </form>
        </div>";
    }
    public function reviews(ReviewPostSettings $postSettings, ReviewItemList $list) {
        $microSchemaHtml_1 = count($list->posts) ? "itemprop='review' itemscope itemtype='http://schema.org/Review'" : '';
        $microSchemaHtml_2 = count($list->posts) ? "<div itemprop='itemReviewed' itemscope itemtype='https://schema.org/Organization'>
                                                <meta itemprop='name' content='{$postSettings->title}' />
                                            </div>" : '';
        $microSchemaHtml_3 = count($list->posts) ? "itemprop='name'" : '';
        $str = "<section class='review'>
                    <div class='comments container' {$microSchemaHtml_1}>
                        {$microSchemaHtml_2}
                    <div class='comments_title' {$microSchemaHtml_3}>📌 {$this->getTranslate('REVIEWS')}</div>";
        $str .= $this->reviewsLoop($list);
        $str .= $this->reviewsForm($postSettings->id);
        $str .= "</div></section>";
        return $str;
    }
}