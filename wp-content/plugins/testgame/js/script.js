document.getElementById('start-game').onclick = function() {
	document.querySelector('.test-game').classList.remove('step-1')
	document.querySelector('.test-game').classList.add('step-2')
}

document.querySelectorAll('.game-answer').forEach(el => el.onclick = function() {
	document.querySelector('.test-game').classList.remove('step-2')
	document.querySelector('.test-game').classList.add('step-3')
	if(this.classList.contains('correct')) {
		document.querySelector('.win').hidden = false
	}
})