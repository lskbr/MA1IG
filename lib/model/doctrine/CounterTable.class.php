<?php

/**
 * CounterTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CounterTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CounterTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Counter');
    }

    public static function getCounterData()
    {
        return CounterTable::getInstance()->createQuery('a')->
            select('a.initial_number, '.
                'FLOOR(a.initial_number + TIMESTAMPDIFF(SECOND, a.initial_date, NOW())*'.
                    'a.objective_number/TIMESTAMPDIFF(SECOND, a.initial_date, '.
                    'ADDDATE(initial_date, INTERVAL period MONTH))) AS planted_trees, '.
                'FLOOR((1 - TIMESTAMPDIFF(SECOND, a.initial_date, NOW())*'.
                    'a.objective_number/TIMESTAMPDIFF(SECOND, a.initial_date, '.
                    'ADDDATE(initial_date, INTERVAL period MONTH)) + '.
                    'FLOOR(TIMESTAMPDIFF(SECOND, a.initial_date, NOW())*'.
                    'a.objective_number/TIMESTAMPDIFF(SECOND, a.initial_date, '.
                    'ADDDATE(initial_date, INTERVAL period MONTH))))*'.
                    '(1000*TIMESTAMPDIFF(SECOND, initial_date, ADDDATE(initial_date, '.
                    'INTERVAL period MONTH))/objective_number)) AS delay, '.
                'FLOOR(1000*TIMESTAMPDIFF(SECOND, initial_date, ADDDATE(initial_date, '.
                    'INTERVAL period MONTH))/objective_number) AS interval')->
            orderBy('a.initial_date DESC')->limit(1)->execute();
    }

    public static function getCounterText($culture, $flag)
    {
    	$data = CounterTable::getInstance()->createQuery('a')->
			select('a.id, b.id, b.flag, t.content')->
			innerJoin('a.Slogan b')->
			innerJoin('b.Translation t')->
			where('t.lang=?', $culture)->
            andWhere('b.type=?', 'counter')->
			andWhere('b.flag=?', $flag)->
            orderBy('a.initial_date DESC')->
            execute(array(), Doctrine::HYDRATE_NONE);

        if (isset($data[0]) && isset($data[0][3]))
            return $data[0][3];
        
        return "";
    }
}