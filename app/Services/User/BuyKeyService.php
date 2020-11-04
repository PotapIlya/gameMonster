<?php


namespace App\Services\User;


use App\Exceptions\BuyKeyException;
use App\Models\Admin\Catalog;
use App\Models\Admin\CatalogKey;
use App\Models\User\ShoppingHistory;
use App\Models\User\UserAbout;
use Auth;

final class BuyKeyService
{

	/**
	 * @param int $id
	 * @return bool|\Illuminate\Http\RedirectResponse
	 * @throws BuyKeyException
	 */
	public function BuyKey(int $id)
	{

		try {
			$userAbout = Auth::user()->about;

			$item = Catalog::where('id', $id)
				->with('key', function ($query) {
					$query->where('status', 1)->first();
				})
				->first();

			if (is_null($item)) {
				throw new \Exception('item is null');
			}

			$newUserMoney = $userAbout->money - $item->price;
			if ($newUserMoney < 0) {
				return redirect()->back()->withErrors(['errors' => 'У вас недостаточно средств']);
//				throw new \Exception('no money');
			}
			if (!UserAbout::where('user_id', Auth::id())->update(['money' => $newUserMoney])) {
				throw new \Exception('money dont update');
			}

			if (!$item->key->first()->update(['status' => 0])) {
				throw new \Exception('ket dont update');
			}

			$createHistory = ShoppingHistory::create([
				'user_id' => Auth::id(),
				'catalog_id' => $item->id,
				'key' => $item->key->first()->key,
			]);
			if ($createHistory) {
				return true;
			} else {
				throw new \Exception('history dont create');
			}

		} catch (\Throwable $e) {
			throw new BuyKeyException();
		}

	}


}