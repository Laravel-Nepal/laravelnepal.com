import Button from "@/Components/Inputs/Button";
import Input from "@/Components/Inputs/Input";
import { useForm } from "@inertiajs/react";
import { FormEvent } from "react";
import { toast } from "react-toastify";
import { route } from "ziggy-js";

const SubscribeToNewsLetter = () => {
    const { errors, data, setData, hasErrors, wasSuccessful, processing, post, reset } = useForm({
        email: "",
    });

    const handleSubmit = (event: FormEvent) => {
        event.preventDefault();
        post(route("newsletter.subscribe"), {
            preserveScroll: true,
            onSuccess: () => {
                reset();
                toast.success("Subscribed successfully! Thank you for joining our newsletter.");
            },
        });
    };

    return (
        <form onSubmit={handleSubmit} className="mt-8">
            <Input
                name="email"
                label="Email Address"
                placeholder="Enter your email address"
                helperText="The website is still under development. You can still subscribe."
                value={data.email}
                onChange={(e) => setData("email", e.target.value)}
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
};

export default SubscribeToNewsLetter;
