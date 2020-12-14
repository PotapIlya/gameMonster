<div class="modal modal-bonus" data-type="bonus">
	<div class="global-wrap ">
		<div class="modal-wrap modal__wrap d-flex flex-column ">

			<h1 class="modal__wrap-title mb-4">
{{--				Приглашайте друзей<br class="d-none d-sm-block">--}}
{{--				и получайте бонусы --}}
                Invite friends<br class="d-none d-sm-block">
                and get bonuses
			</h1>


			<p class="modal__wrap-text">
                For each participant brought in you <br class="d-none d-sm-block">
                get 500 rubles to your account one time, and 20% off <br class="d-none d-sm-block">
                referral purchases for 3 months
{{--				За каждого приведенного участника Вы<br class="d-none d-sm-block">--}}
{{--				получите 500р на счет единоразово, и 20% от<br class="d-none d-sm-block">--}}
{{--				покупок реферала на протяжение 3-х месяцев--}}
			</p>

            <div class="mb-sm-3 mb-2 d-flex align-items-center">
                @foreach($items as $item)
                    <div class="social__network mr-3">
                        <a href="{{ $item->href }}" class="service1">
                            {!! $item->icon !!}
                        </a>
                    </div>
                @endforeach
            </div>

			<div class="modal__wrap-group">
				<label for="" class="d-flex align-items-start align-items-sm-center flex-column flex-lg-row">
					<input class="modal__wrap-input mr-0 mr-lg-4 mb-3 mb-lg-0"
						   value="gamemonster.store/ref/fatherofnations"
						   autofocus
						   type="text"
						   disabled
					>
					<button class="button getCash">Copy</button>
				</label>
			</div>
			<button style="left: 90%; right: auto" class="button-close close">&#10006;</button>
		</div>
	</div>
</div>
