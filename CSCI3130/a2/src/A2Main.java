import com.Ostermiller.util.CSVParser;
import directory.*;
import java.util.List;
import java.util.ArrayList;
import java.util.Iterator;
import java.io.FileReader;
import java.io.IOException;

/**
 * Test routines for EmployeeDirectory
 * @author Derek Reilly
 */
public class A2Main {
	private static EmployeeDirectory directory;
	
	/* loads all records in csv files for employees and phones */
	private static void loadRecords () throws IOException {

		// get employee data first
		List employees = new ArrayList (), phones = new ArrayList ();
		String [][] emp_data = CSVParser.parse (new FileReader ("res" + java.io.File.separator + "employees.csv"), "", "", "#");
		for (int i = 0; i < emp_data.length; i++) {
			if (emp_data [i].length != 4) break; // ignore line
			employees.add (new Employee (Integer.parseInt (emp_data[i][0]), emp_data[i][1],
										 emp_data[i][2], emp_data[i][3]));
		}
		
		// now get phone data

		String [][] phone_data = CSVParser.parse (new FileReader ("res" + java.io.File.separator + "phones.csv"), "", "", "#"); 
		for (int i = 0; i < phone_data.length; i++) {
			if (phone_data [i].length != 3) break; // ignore line
			phones.add (new Phone (Integer.parseInt (phone_data[i][0]), 
								   Integer.parseInt (phone_data[i][1]),
								   phone_data[i][2]));
		}
		
		// create the directory
		directory = new EmployeeDirectory (employees, phones);
	}

	/**
	 * Simply loads the records and prints the directory in 
	 * department, name order
	 */
	public static void main (String [] args) {
		try { // load the records
			loadRecords ();
		} catch (IOException ioe) {
			ioe.printStackTrace ();
			System.exit (-1);
		}
		
		// try adding an employee
		String number = "989-7575";
		String name = "Barb Andrews";
		int empId = 1000;
		directory.addEmployee (new Employee (empId, name, "Programmer", "IT"));
		directory.addPhone (new Phone (Phone.DESKPHONE, empId, number));

		// print the directory by department, name
		for (Iterator it = directory.byDepartment ().iterator ();
			 it.hasNext (); ) System.out.println (it.next ());

		// try getting the employee
		System.out.println ();
		System.out.println ("\nTesting employee and phone retrieval");
		Employee barb = directory.getEmployeeByDeskPhone (number);
		System.out.println (barb.toPrintedString ());
		Phone desk = (Phone) directory.getPhones (empId).toArray ()[0];
		System.out.println (desk.toPrintedString ());
		

	}

	
}
