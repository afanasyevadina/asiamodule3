<?php 
/*
Plugin Name: Test Game KZ
Author: KZ
Version: 1.0
*/

add_action('wp_enqueue_scripts', 'enqueue_scripts_test_game_kz');
function enqueue_scripts_test_game_kz()
{
	wp_enqueue_script('test-game-kz-script', plugin_dir_url(__FILE__) . '/js/script.js', [], '1.0', true);
	wp_enqueue_style('test-game-kz-style', plugin_dir_url(__FILE__) . '/css/style.css');
}

add_shortcode('test_game_kz', 'test_game_kz');

function test_game_kz($attr, $content)
{
	$questions = [
		[
			'question' => '2 + 2 * 2 = 8',
			'answer' => false,
			'fact' => '9 + 8 = 17',
		],
		[
			'question' => 'London is the capital of Great Britain',
			'answer' => true,
			'fact' => 'Lorem ipsum!!!',
		],
	];
	$question = $questions[mt_rand(0, count($questions) - 1)];
	?>
	<div class="test-game step-1">
		<div class="container" id="start-screen">
			<div id="start-screen">
				<div class="game-title"><span class="text-yellow">Get promocode</span> in one click</div>
				<div class="game-subtitle">The purpose of this game is improving erudition and of course, help you to get a gift :)</div>
				<div class="d-flex j-center">
					<button class="btn bg-blue text-white" id="start-game">Start!</button>
				</div>
			</div>
		</div>
		<div class="container" id="game-screen">
			<div class="game-title">True or false?</div>
			<div class="game-subtitle"><?= $question['question'] ?></div>
			<div class="answers d-flex j-center">
				<button class="btn btn-white text-white game-answer <?=$question['answer'] ? 'correct' : ''?>">True</button>
				<button class="btn btn-white text-white game-answer <?=$question['answer'] ? '' : 'correct'?>">False</button>
			</div>
		</div>
		<div class="container" id="end-screen">
			<div class="game-title">Finish!</div>
			<div class="game-subtitle win" hidden>
				Good news, here is your promocode: <span class="text-yellow"><?= strtoupper(substr(md5(time()), 0, 10)) ?></span></p>
			</div>
			<i>
				Learn new fact: <?= $question['fact'] ?>
			</i>
		</div>
	</div>
	<?php 
}
?>