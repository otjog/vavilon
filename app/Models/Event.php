<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['id', 'active', 'name', 'time'];

    public function getNextEvent()
    {

        //функция неверная, нужна сортировка по полю time
        $event = self::where('active', 1)
            ->orderBy('created_at', 'desc')
            ->first();

        $eventTemporary = $this->addNormalizeTime([$event]);

        return $eventTemporary[0];
    }

    public function getActiveEvents()
    {
        $events = self::where('active', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return $this->addNormalizeTime($events);
    }

    protected function addNormalizeTime ($events)
    {
        $year = date('Y');
        $currentDate = date('Y-m-d H:i:s');

        foreach ($events as $event) {
            list($min, $hour, $day, $month) = explode(' ', $event->time);
            $event->datetime = $year . '-' . $month . '-' . $day . ' ' . $hour . ':' . $min . ':00';
            $event->timestamp = strtotime($event->datetime);

            if($currentDate > $event->datetime)
                $event->button_header = 'Изменить дату следующего розыгрыша';
            else
                $event->button_header = 'Назначить дату нового розыгрыша';
        }

        return $events;
    }

}
