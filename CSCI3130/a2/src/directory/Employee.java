package directory;
/**
 * Employee represents a company employee
 *
 * @author Derek Reilly
 */
public class Employee implements Comparable {
	private int empNumber; // unique id
	private String name; // single name
	private String position; // e.g programmer
	private String department; // e.g. new product development

	/** 
	 * Creates a new <code>Employee</code> instance.
	 * @param empNum employee id
	 * @param name employee name
	 * @param pos employee position
	 * @param dept employee department
	 */
	public Employee (int empNum, String name, String pos, String dept) {
		empNumber = empNum;
		this.name = name;
		position = pos;
		department = dept;
	}
	
	/** Gets this employee's id
	 * @return the id
	 */
	public int getEmployeeId () { return empNumber; }

	/** Gets this employee's name
	 * @return the name
	 */
	public String getName () { return name; }

	/** Gets this employee's position
	 * @return the position
	 */
	public String getPosition () { return position; }

	/** Gets this employee's department
	 * @return the department
	 */
	public String getDepartment () { return department; }

	/** suitable for debug  */
	public String toString () {
		StringBuffer sb = new StringBuffer ("Employee[id: "); sb.append (empNumber); 
		sb.append (", name: "); sb.append (name);
		sb.append (", position: "); sb.append (position);
		sb.append (", department: "); sb.append (department);
		sb.append (']');
		return sb.toString ();
	}

	/** Pretty-formatted, suitable for listings */
	public String toPrintedString () {
		StringBuffer sb = new StringBuffer (" id : "); sb.append (empNumber); 
		sb.append (", name : "); sb.append (name);
		sb.append ("\n position : "); sb.append (position);
		sb.append ("\n department : "); sb.append (department);
		return sb.toString ();
	}

	/** Just throws the <code>ClassCastException</code> */
	public int compareTo (Object o) {
		throw new ClassCastException ("Can only compare to Employee objects");
	}
	
	/** 
	 * Overloaded <code>compareTo</code> to compare <code>Employees</code>. <br/>
	 * Compare by name, then by id.
	 * @param e the <code>Employee</code> to compare with
	 * @return a negative integer, zero, or a positive integer if this 
	 * <code>Employee</code> is less than, equal to, or greater than the 
	 * provided <code>Employee</code>, respectively.
	 */
	public int compareTo (Employee e) {
		int name_comparison = this.name.compareToIgnoreCase (e.name);
		return (name_comparison == 0) 
			? new Integer (this.empNumber).compareTo (new Integer (e.empNumber))
			: name_comparison;
	}

	/**
	 * <code>Employee</code> objects are equal if they have the same employee id
	 */
	public boolean equals (Object o) {
		return (o instanceof Employee && 
				this.empNumber == ((Employee)o).empNumber); 
	}

    public int hashCode () {
	return empNumber;
    }

}// Employee
