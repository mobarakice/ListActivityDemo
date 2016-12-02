# Adapter for spinner

public class SimpleAdapter extends ArrayAdapter<String> {

    public SimpleAdapter(Context context, int resource, String[] objects) {
        super(context, resource, objects);
    }

    @Override
    public int getCount() {
        return super.getCount()-1;
    }
}


## setup adapter for spinner
private void setAdapter() {  
        Spinner sp =(Spinner) findViewById(R.id.sp1);
        String[] operatinSL = {"Android", "Windows", "Ios", "Linux", "Blackbery","Pick From Drop Down"};
        SimpleAdapter adapter = new SimpleAdapter(this, android.R.layout.simple_spinner_item, operatinSL);
       // adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        sp.setAdapter(adapter);
        sp.setSelection(adapter.getCount());
    }
