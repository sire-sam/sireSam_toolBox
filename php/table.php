<?php
class makeHtml
{
    /**
    * Formate un tableau sur base des paramètres conf
    */
    public function table($data,$conf,$pattern)
    {
        if (empty($conf) OR empty($pattern) OR empty($data)) {
        return null;
        }

        //        $table = '<table>';
            $table = self::tableHead($data[0],$pattern,$conf);
            $table .= self::tableBody($data,$pattern,$conf);
            //        $table .= '</table>';

        return $table;

    }
    /**
    * Formate une entête de tableau
    */
    public function tableHead ($row,$pattern,$conf)
    {

        if (empty($row) OR empty($pattern)) {
        return null;
        }

        $output = '<thead>';
        $output .= '<tr>';
            foreach ($pattern as $col => $v)
            {
            if (array_key_exists($col,$row)) {
            $search = null;
            if (isset($v['search'])) {
            $searchClass  =   (is_string($v['search'])) ? $v['search'] : 'input-small';
            $search =   '<input class="'.$searchClass.'" type="text" name="search-'.$col.'" data-search="'.$col.'" id="search-'.$col.'" />';
            }
            $output .=
            '<th class="'.$v['class'].'" title="'.$v['label'].'">'.
                $v['label'].
                $search.
                '</th>';
            }
            }
            if (isset($conf['edit'])) {
            $output .=
            '<th class="mini">'.
                'Editer'.
                '</th>';
            }
            if (isset($conf['delete'])) {
            $output .=
            '<th class="mini">'.
                'Supprimer'.
                '</th>';
            }

            $output .= '</tr>';
        $output .= '</thead>';

        return $output;
    }
    /**
    * Formate donnée dans <body>
    */
    public function tableBody ($data,$pattern,$conf)
    {
        if (empty($conf) OR empty($pattern) OR empty($data)) {
        return null;
        }
        $output = null;
        foreach ($data as $row)
        {
        $output .= '<tr>';
            foreach ($pattern as $col => $v)
            {
            $output .= '<td>';
                if ($v['display'] == 'check') {
                $icon = $row[$col] != '' ? 'icon-check' : 'icon-check-empty';
                $output .= '<span class="'.$icon.'"></span>';
                } else {
                $output .= $row[$col];
                }
                $output .= '</td>';
            }

            if (isset($conf['edit'])) {
            if ($conf['edit'] === 'no-link') {
            $output .=
            '<td>'.
                '<span class="icon-pencil" data-edit="'.$row[$conf['relKey']].'" title="Editer">&nbsp;</span>'.
                '</td>';

            } elseif ($conf['edit'] === true) {
            $output .=
            '<td>'.
                '<a href="'.$conf['script'].'&amp;action=edit&amp;id='.$row[$conf['relKey']].'" title="Editer" class="link-edit">'.
                    '<span class="icon-pencil">&nbsp;</span>'.
                    '</a>'.
                '</td>';

            }
            }
            if (isset($conf['delete'])) {
            if ($conf['delete'] == 'no-link') {
            $output .=
            '<td>'.
                '<span class="icon-trash" data-delete="'.$row[$conf['relKey']].'" title="Supprimer">&nbsp;</span>'.
                '</td>';


            } elseif ($conf['delete'] === true) {
            $output .=
            '<td>'.
                '<a href="'.$conf['script'].'&amp;action=delete&amp;id='.$row[$conf['relKey']].'" title="Supprimer" class="link-delete">'.
                    '<span class="icon-trash">&nbsp;</span>'.
                    '</a>'.
                '</td>';

            }
            }
            $output .= '</tr>';
        }
        if (isset($conf['tbody']) && $conf['tbody'] === false) {
        return $output;

        }
        return '<tbody>'.$output.'</tbody>';


    }
}

$pattern = array(
    'id_sqlCol' => array(
        'label' => 'id',
        'display' => 'value',
        'class' =>  'mini'
    ),
    'iso' => array(
        'label' => 'lang',
        'display' => 'value',
        'class' =>  'mini'
    ),
    'name_sqlCol' => array(
        'label' => 'Nom',
        'display' => 'value',
        'class' =>  'auto',
        'search'    =>  'input-large pull-right'
    ),
    'content_sqlCol' => array(
        'label' => 'Contenus',
        'display' => 'check',
        'class' =>  'small'
    ),
    'id_parent' => array(
        'label' => 'Parent',
        'display' => 'value',
        'class' =>  'small'
    )
);
$conf   =   array(
    'script'    =>  'script_to_object.php',
    'edit'  =>  true,
    'delete' =>  'no-link',
    'container' =>  false,
    'relKey'    =>  'id_sqlCol'
);

$table = makeHtml_table::table($data,$conf,$pattern);

