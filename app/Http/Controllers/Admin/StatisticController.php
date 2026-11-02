<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $statistics = Statistic::orderBy('sort_order', 'asc')->get();
        return view('admin.statistics.index', compact('statistics'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'stats' => 'required|array',
            'stats.*.id' => 'required|exists:statistics,id',
            'stats.*.stat_value' => 'required|string|max:50',
            'stats.*.stat_label' => 'required|string|max:100',
            'stats.*.icon_class' => 'nullable|string|max:100',
        ]);

        foreach ($request->stats as $item) {
            Statistic::where('id', $item['id'])->update([
                'stat_value' => $item['stat_value'],
                'stat_label' => $item['stat_label'],
                'icon_class' => $item['icon_class'] ?? 'fa-solid fa-chart-line',
            ]);
        }

        return redirect()->back()->with('success', 'Data Statistik berhasil diperbarui!');
    }
}

