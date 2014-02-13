package directory;
/**
 * Phone represents a phone
 *
 * @author Derek Reilly
 */
public class Phone implements Comparable {
	/** phone type */
	public static final int DESKPHONE = 0; 
	/** phone type */
	public static final int FAX	= 1;
	/** phone type */
	public static final int CELLPHONE = 2;
	/** phone type */
	public static final int PAGER = 3;

	private int type; // type of phone, see above
	private int employeeId; // employee number of employee owning phone
	private String phoneNumber; // the phone number

	/** 
	 * Creates a new <code>Employee</code> instance.
	 * @param type type of phone
	 * @param empNum id of owning employee
	 * @param number the phone number
	 */
	public Phone (int type, int empNum, String number) {
		this.type = type;
		employeeId = empNum;
		phoneNumber = number;
	}
	
	/** Gets this phone's type
	 * @return the type
	 * @see #DESKPHONE Valid Phone Types
	 */
	public int getType () { return type; }

	/** Gets this phone's employee id
	 * @return the employee id
	 */
	public int getEmployeeId () { return employeeId; }

	/** Gets this phone's number
	 * @return the phone number
	 */
	public String getNumber () { return phoneNumber; }

	/* provides a String representation of the phone type */
	private String typeName () {
		String tn;
		switch (type) {
		case DESKPHONE : tn = "desk phone";
			break;
		case FAX : tn = "fax";
			break;
		case CELLPHONE : tn = "cellphone";
			break;
		case PAGER : tn = "pager";
			break;
		default : tn = "unknown";
			break;
		}
		return tn;
	}

	/** suitable for debug */
	public String toString () {
		StringBuffer sb = new StringBuffer ("Phone [number: ");
		sb.append (phoneNumber); 
		sb.append (", type: "); sb.append (typeName ()); 
		sb.append (", employee number: "); sb.append (employeeId);
		sb.append (']');
		return sb.toString ();
	}

    /** Pretty-formatted, suitable for listings */
    public String toPrintedString () { 
	StringBuffer sb = new StringBuffer ("Phone\n number : ");
	sb.append (phoneNumber); 
	sb.append ("\n type : "); sb.append (typeName ()); 
	sb.append ("\n employee number : "); sb.append (employeeId);
	sb.append ('\n');
	return sb.toString ();
    }

	/**
	 * Compares employee id, then phone number.<br/> 
	 * Successfully compares to other <code>Phones</code> only.
	 */
	public int compareTo (Object o) {
		if (! (o instanceof Phone)) {
			throw new ClassCastException ("Phones can only compare to other Phones");
		}
		Phone p = (Phone) o;
		int comp = (employeeId == p.employeeId) ? 0 : (employeeId < p.employeeId) ? 1 : -1;
		if (comp == 0) comp = phoneNumber.compareTo (p.phoneNumber);
		return comp;
	}

	/**
	 * Phones are equal if they share the same number and employee id
	 */
	public boolean equals (Object o) { return compareTo (o) == 0; }

    public int hashCode () { return phoneNumber.hashCode (); }

}// Phone
