// Validation errors messages for Parsley
// Load this after Parsley

Parsley.addMessages('ms', {
  defaultMessage: "Maklumat tidak sah.",
  type: {
    email:        "Maklumat mestilah dalam format emel yang sah.",
    url:          "Maklumat mestilah dalam bentuk url yang sah.",
    number:       "Hanya nombor dibenarkan.",
    integer:      "Hanya integer dibenarkan.",
    digits:       "Hanya angka dibenarkan.",
    alphanum:     "Hanya alfanumerik dibenarkan."
  },
  notblank:       "Ruangan ini tidak boleh kosong.",
  required:       "Ruangan ini wajib diisi.",
  pattern:        "Bentuk maklumat ini tidak sah.",
  min:            "Maklumat perlu lebih besar atau sama dengan %s.",
  max:            "Maklumat perlu lebih kecil atau sama dengan %s.",
  range:          "Maklumat perlu berada antara %s hingga %s.",
  minlength:      "Maklumat terlalu pendek. Ianya perlu sekurang-kurangnya %s huruf.",
  maxlength:      "Maklumat terlalu panjang. Ianya tidak boleh melebihi %s huruf.",
  length:         "Panjang maklumat tidak sah. Panjangnya perlu diantara %s hingga %s huruf.",
  mincheck:       "Anda mesti memilih sekurang-kurangnya %s pilihan.",
  maxcheck:       "Anda tidak boleh memilih lebih daripada %s pilihan.",
  check:          "Anda mesti memilih diantara %s hingga %s pilihan.",
  equalto:        "Maklumat dimasukkan hendaklah sama."
});

Parsley.setLocale('ms');