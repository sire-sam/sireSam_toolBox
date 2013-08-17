Fichiers LESS utilisés pour adapter Bootstrap 3.0 RC 2 à certain de mes usages.

### Responsive utilities

Ajout de class suplémentaire pour l'affichage sur plusieur "tailles".

Higher:
* .visible-sm-higher
* .visible-md-higher
* .hidden-sm-higher
* .hidden-md-higher

Lower:
* .visible-sm-lower
* .visible-md-lower
* .hidden-sm-lower
* .hidden-md-lower

### Mixins

Modification de .responsive-visibility() et .responsive-invisibility(),
afin de conserver un affichage de type **inline** pour les élément de type **<span>**

.responsive-visibility() {
  display: block !important;
  tr& { display: table-row !important; }
  th&,
  td& { display: table-cell !important; }
  span& { display: inline !important;}
}

.responsive-invisibility() {
  display: none !important;
  tr& { display: none !important; }
  th&,
  td& { display: none !important; }
  span& { display: none !important; }
}
