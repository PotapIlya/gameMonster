<div class="modal modal-bonus" data-type="bonus">
	<div class="global-wrap ">
		<div class="modal-wrap modal__wrap d-flex flex-column ">

			<h1 class="modal__wrap-title mb-4">
				Приглашайте друзей<br class="d-none d-sm-block">
				и получайте бонусы
			</h1>
			<p class="modal__wrap-text">
				За каждого приведенного участника Вы<br class="d-none d-sm-block">
				получите 500р на счет единоразово, и 20% от<br class="d-none d-sm-block">
				покупок реферала на протяжение 3-х месяцев
			</p>

			<div class="modal__wrap-group">
				<label for="" class="d-flex align-items-center flex-column flex-lg-row">
					<input class="modal__wrap-input mr-0 mr-lg-4 mb-3 mb-lg-0"
						   value="gamemonster.store/ref/fatherofnations"
						   autofocus
						   type="text"
						   disabled
					>
					<button class="button getCash">Скопировать</button>
				</label>
			</div>
			<button style="left: 90%; right: auto" class="button-close close">&#10006;</button>
		</div>
	</div>
</div>


<script>
    if (document.querySelector('.modal-bonus'))
    {
        const modal = document.querySelector('.modal-bonus')
        const open = document.getElementById('bonus');

        const modalWrap = modal.querySelector('.global-wrap')
        const close = modal.querySelector('.close')

        const cash = modal.querySelector('.getCash')



		cash.addEventListener('click', () => {
			if (modal.classList.contains('d-block'))
			{
				const input = cash.parentElement.querySelector('input');
				input.removeAttribute('disabled');

				input.select();
				document.execCommand("copy");

				input.setAttribute('disabled', 'disabled');
			}
		})


        open.addEventListener('click', () => {
            modal.classList.add('d-block')
        })

        window.addEventListener('click', (e) => {
            if (e.target === modalWrap )
            {
                modal.classList.remove('d-block')
            }
        })
        close.addEventListener('click', () => {
            modal.classList.remove('d-block')
        })

    }
</script>