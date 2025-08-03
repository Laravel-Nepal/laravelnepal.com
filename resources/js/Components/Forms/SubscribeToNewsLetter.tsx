import InputField from "@/Components/Input/InputField";
import {useForm} from '@inertiajs/react';
import Button from "@/Components/Input/Button";

const SubscribeToNewsLetter = () => {
    const {errors, data, setData,  hasErrors, wasSuccessful, processing} = useForm({
        email: '',
    });

    const handleSubmit = async (event) => {
        event.preventDefault();
        // Here you would typically send the email to your backend for processing
        // For example:
        // await axios.post('/subscribe', { email: data.email });
        console.log("Subscribed with email:", data.email);
    }

    return (
        <form onSubmit={handleSubmit} className="mt-8">
            <InputField
                type="email"
                name="email"
                label="Email Address"
                placeholder="Enter your email address"
                helperText="The website is still under development, but you can subscribe to our newsletter to get updates."
                value={data.email}
                onChange={(e) => setData('email', e.target.value)}
                errorMessage={errors.email}
            />
            <Button
                type="submit"
                className="mt-2 w-full px-4 py-2"
                loading={processing}
                disabled={processing}
                isSuccess={wasSuccessful}
                isError={hasErrors}
            >
                Subscribe
            </Button>
        </form>
    );
}

export default SubscribeToNewsLetter;
