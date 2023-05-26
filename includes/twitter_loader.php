<?php
	echo '<div class="twitter-wrapper">';
	echo twitter_feedin(3);
	echo '<a href="https://twitter.com/mercyhealth" target="_blank" class="footer-more">More &gt;</a>';
	echo '</div>';
	
	function twitter_feedin($count) {
		// include handshake files
		include( get_template_directory() . 'twitter_inc/tmhOAuth.php' );
		include( get_template_directory() . 'twitter_inc/tmhUtilities.php' );
		
		// use cache if not too old
		if(file_exists('twitter_cache.json')) {
			$modtime = filemtime('twitter_cache.json');
			$timeago = time() - 10 * 60;
			if($modtime > $timeago){
				$feed = json_decode(file_get_contents('twitter_cache.json'));
			}
		}
		
		//otherwise
		$feed_auth = new tmhOAuth(array(
		  'consumer_key'    => 'f2yE9VVJb3F8OosCUXZuLw',
		  'consumer_secret' => 'l5sLyoOwbEPO6zrVaVs5sZIF0ByQIJBqMALOSO0SZes',
		  'user_token'      => '16928633-cLMZSAwAXLvGHpoz3zqMzImCN40jclKFMauuqOYav',
		  'user_secret'     => 'XoFABPUKZM13nyU64I1OE91BKhcJZC5LeRj2N4Ftlc',
		));
		if($count){
			$code = $feed_auth->request('GET', $feed_auth->url('1.1/statuses/user_timeline'), array(
			'count' => $count,
			'include_entities' => '1',
			'include_rts' => '1',
			'screen_name' => 'mercyhealth'));
		} else { 
			$code = $feed_auth->request('GET', $feed_auth->url('1.1/statuses/user_timeline'), array(
			'include_entities' => '1',
			'include_rts' => '1',
			'screen_name' => 'mercyhealth'));
		}
		if ($code == 200) {
			$timeline = @json_decode($feed_auth->response['response'], true) or NULL;
			$processed_feed = '<ul>';
			$i = 1;
			foreach ($timeline as $tweet) {
				$entified_tweet = tmhUtilities::entify_with_options($tweet);
				$created_at = time_difference($tweet['created_at']);
				
				$permalink  = str_replace(
					array(
						'%screen_name%',
						'%id%',
						'%created_at%'
					),
					array(
						$tweet['user']['screen_name'],
						$tweet['id_str'],
						$created_at,
					),
					'<a href="https://twitter.com/%screen_name%/status/%id%" target="_blank">%created_at%</a>'
				);
				$processed_feed .=
					'<li><p'.($i == 1 ? ' class="first-tweet"' : '').'>'.$entified_tweet.'<span> - '.$permalink.'</span></p></li>';
				$i++;
			}
			$processed_feed .= '</ul>';
			// we have processed it, let's store it.	
			$feed_file = array('twitter_feed' => $processed_feed, 'timestamp' => time());
			file_put_contents('twitter_cache.json', json_decode($feed_file));
			
			// return to our user
			return $processed_feed;
		}
		
		else { 
			return NULL; 
		}
	}
?>