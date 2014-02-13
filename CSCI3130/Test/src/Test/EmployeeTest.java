package Test;
import directory.*;
import static org.junit.Assert.*;
import org.junit.Test;

public class EmployeeTest {

	@Test
	public void test() {
		Employee e1 = new Employee(1, "Bob", "programmer", "software");
		Employee e2 = new Employee(1, "Bob", "programmer", "software");
		assertEquals("Employee ID should be 1", 1, e1.getEmployeeId());
		assertEquals("name should be Bob", "Bob", e1.getName());
		assertEquals("position should programmer", "programmer", e1.getPosition());
		assertEquals("department should be software", "software", e1.getDepartment());
		assertTrue("e1 should equal e2", e1.equals(e2));
		assertEquals("e1 should return 0", 0, e1.compareTo(e2));
	}
	@Test
	public void test2()
	{
		Phone p1 = new Phone(0,1,"9020123456");
		Phone p2 = new Phone(1,1,"9020123456");
		assertEquals("Employee ID should be 1", 1, p1.getEmployeeId());
		assertEquals("type should be 0", 0, p1.getType());
		assertEquals("number should be 9020123456", "9020123456", p1.getNumber());
		assertEquals("compare should be 0", 0, p1.compareTo(p2));
		assertTrue("p1 should equal p2", p1.equals(p2));
	}
}