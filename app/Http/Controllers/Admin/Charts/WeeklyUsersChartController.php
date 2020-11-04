<?php

namespace App\Http\Controllers\Admin\Charts;

use App\Models\Admin\CatalogKey;
use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

/**
 * Class WeeklyUsersChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeeklyUsersChartController extends ChartController
{
    public function setup()
    {
		$this->chart = new Chart();

		$this->chart->dataset('Red', 'pie',
			[
				CatalogKey::where('status', 1)->count(),
				CatalogKey::where('status', 0)->count()
			])
			->backgroundColor([
				'rgb(70, 127, 208)',
				'rgb(96, 92, 168)',
			]);

		// OPTIONAL
		$this->chart->displayAxes(false);
		$this->chart->displayLegend(true);

		// MANDATORY. Set the labels for the dataset points
		$this->chart->labels(['Активные', 'Купленные']);
    }

    /**
     * Respond to AJAX calls with all the chart data points.
     *
     * @return json
     */
    // public function data()
    // {
    //     $users_created_today = \App\User::whereDate('created_at', today())->count();

    //     $this->chart->dataset('Users Created', 'bar', [
    //                 $users_created_today,
    //             ])
    //         ->color('rgba(205, 32, 31, 1)')
    //         ->backgroundColor('rgba(205, 32, 31, 0.4)');
    // }
}