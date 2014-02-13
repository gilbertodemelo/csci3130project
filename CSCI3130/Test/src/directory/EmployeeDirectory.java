package directory;
import java.util.*;
/**
 * Provides access to and listings of the employee directory
 * @author Derek Reilly
 */ 
public class EmployeeDirectory {
	// internal representations
	private Map emp_index, phone_index, phone_by_name, emp_by_phone;

	/**
	 * Creates a new directory using the data provided.
	 * @param employees the employees to add to the directory
	 * @param phones the phone listings; each must be associated with
	 * an employee in <code>employees</code> via their 
	 * <employeeId</code> value.
	 */
	public EmployeeDirectory (List employees, List phones) {
		buildIndexes (employees, phones);
	}

	/* builds the internal directory data structures */
	private void buildIndexes (List employees, List phones) {
		// employee by id
		emp_index = new HashMap ();
		
		for (Iterator i = employees.iterator (); i.hasNext (); ) {
			Employee e = (Employee) i.next ();
			emp_index.put (new Integer (e.getEmployeeId ()), e);
		}

		// employees by phone number
		emp_by_phone = new HashMulti ();
		
		// phone object(s) by employee name
		phone_by_name = new HashMulti ();
		// phone object(s) by employee id
		phone_index = new HashMulti ();
		for (Iterator i = phones.iterator (); i.hasNext (); ) {
			Phone p = (Phone) i.next ();
			Employee e = (Employee) emp_index.get (new Integer (p.getEmployeeId ()));
			phone_by_name.put (e.getName (), p);
			emp_by_phone.put (p.getNumber (), e);
			phone_index.put (new Integer (e.getEmployeeId ()), p);
		}
	}

	/**
	 * Adds an employee to the directory
	 * @param e the <code>Employee</code> to add
	 */
	public void addEmployee (Employee e) {
		emp_index.put (new Integer (e.getEmployeeId ()), e);
		// assuming that there are no phones with this employee id currently 
	}

	/**
	 * Adds a phone to the directory. <br/>
	 * <em>Note:</em> assumes that related employee (via <code>EmployeeId</code>)
	 * is already listed in the directory
	 * @param p the <code>Phone</code> to add.
	 * @see #addEmployee(Employee) addEmployee
	 */
	public void addPhone (Phone p) {
		Integer empId = new Integer (p.getEmployeeId ());
		Employee e = (Employee) emp_index.get (empId);
		emp_by_phone.put (p.getNumber (), e);
		phone_by_name.put (e.getName (), p);
		phone_index.put (empId, p);
	}

	/**
	 * Provides the list of phones associated with employee(s)
	 * having the given name.
	 * @param name the associated employee(s) name
	 * @return a <code>Set</code> of all <code>Phone</code>s matched
	 * or <code>null</code> if none were found
	 */
	public Set getPhones (String name) { 
		return (Set) phone_by_name.get (name); 
	}

	/**
	 * Provides the list of phones associated with the employee
	 * with the given id.
	 * @param name the associated employee id
	 * @return a <code>Set</code> of all <code>Phone</code>s matched
	 * or <code>null</code> if none were found
	 */ 
	public Set getPhones (int employeeId) { 
		return (Set) phone_index.get (new Integer (employeeId)); 
	}

	/**
	 * Returns the single employee with the given desk phone number.
	 * <br/><em>Note:</em> if more than one employee is encountered with
	 * the given desk phone number, the first employee is returned.
	 * @param number the phone number
	 * @return the matching <code>Employee</code>, or <code>null</code> 
	 */
	public Employee getEmployeeByDeskPhone (String number) {
		Collection e = (Collection) emp_by_phone.get (number);
		return (e == null) ? null : (Employee) e.toArray ()[0];
	}

	/**
	 * Returns a <code>Set</code> of employees with the number provided
	 * @param number the phone number
	 * @return the set of employees with the given phone number, 
	 * or <code>null</code> if none were found.
	 */
	public Set getEmployeesByPhone (String number) { 
		return (Set) emp_by_phone.get (number); 
	}

	/**
	 * Returns a list of <code>Strings</code> suitable for display 
	 * in a directory listing.<br/>
	 * Ordering is by employee name.
	 * @return the sorted directory listings
	 */
	public List byEmployeeName () {
		return makeListings (new TreeSet (emp_index.values ()));
	}

	/**
	 * Returns a list of <code>Strings</code> suitable for display 
	 * in a directory listing.<br/>
	 * Ordering is by department, then employee name.
	 * @return the sorted directory listings
	 */
	public List byDepartment () {
		SortedSet by_dept = new TreeSet 
			(new Comparator () {
					public int compare (Object o1, Object o2) {
						if (!(o1 instanceof Employee) || !(o2 instanceof Employee)) 
							throw new ClassCastException 
								("Can only compare two Employee objects, have " +
								 o1.getClass ().getName () + " and " + 
								 o2.getClass ().getName ());

						Employee e1 = (Employee) o1; Employee e2 = (Employee) o2;
						int dept_comparison = e1.getDepartment ().compareToIgnoreCase 
							(e2.getDepartment ());
						return (dept_comparison == 0) ? e1.compareTo (e2) : dept_comparison;
					}
				});

		by_dept.addAll (emp_index.values ());
		return makeListings (by_dept);
	}

	/* routine to create listings in the provided order */
	private List makeListings (SortedSet emps_sorted) {
		ArrayList listings = new ArrayList ();
		for (Iterator emps = emps_sorted.iterator (); emps.hasNext (); ) {
			Employee e = (Employee) emps.next ();
			String listing_open = e.getName () + ", " + e.getDepartment () + ": ";
			String listing_close = " (employee id " + e.getEmployeeId () + ")";
			for (Iterator phones = getPhones (e.getEmployeeId ()).iterator (); 
				 phones.hasNext (); ) {
				Phone p = (Phone) phones.next ();
				listings.add (listing_open + p.getNumber () + listing_close); 
			}
		}
		return listings;
	}

	/**
	 * A <code>HashMap</code> that adds to a <code>Set</code> of matching values
	 * with subsequent calls to <code>put</code> with a given key.
	 */
	class HashMulti extends HashMap {
		/** Overridden to add to list of values rather than replace */
		public Object put (Object key, Object val) {
			boolean ok = false;
			Set multi = (Set) this.get (key);
			Object prev = multi;
			if (multi == null) multi = new LinkedHashSet (); 
			if (multi.add (val)) {
				super.put (key, multi);
				ok = true;
			}
			return prev;
		}
	}		

}
